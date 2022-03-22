<?php
namespace App\models;

use App\models\QueryBuilder;
use App\services\Mailer;
use Dompdf\Adapter\PDFLib;
use Dompdf\Dompdf;
use Dompdf\Options;

class Candidates
{
    protected $table = "candidate";

    protected $tableJoin = "forms";

    private $builder;
    /**
     * @var Mailer
     */
    private $mailer;
    /**
     * @var Dompdf
     */
    private $dompdf;
    /**
     * @var Options
     */
    private $options;


    public function __construct(QueryBuilder $builder,Mailer $mailer,Dompdf $dompdf,Options $options)
    {
        $this->builder = $builder;
        $this->mailer = $mailer;
        $this->options = $options->set("isRemoteEnabled",'true');
        $this->dompdf = $dompdf->setOptions($this->options);

    }
    public function select($id = null )
    {
        if((int)$id)
            return $this->builder->joinLeftOne($this->table,$this->tableJoin,'form_id','id',$id);
        if ($id=="mail")
            return $this->builder->distinsName($this->table,$id);
        elseif( $id == 'new')
            return $this->builder->joinLeftWithWhere($this->table,$this->tableJoin,'form_id','id'," WHERE $this->table.status = 0");
        elseif( $id == 'active')
            return $this->builder->joinLeftWithWhere($this->table,$this->tableJoin,'form_id','id'," WHERE $this->table.status = 1");
        elseif( $id == 'disabled')
            return $this->builder->joinLeftWithWhere($this->table,$this->tableJoin,'form_id','id'," WHERE $this->table.status = -1");
    }

    public function add($data)
    {
//        check captcha
        if(isset($data['norobot']) && !empty($data['norobot'])) {
            if (md5($data['norobot']) != $_SESSION['randomnr2']) {
                $_SESSION['errorCaptcha'] = "Error Captcha";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                die();
            } else
                unset($_SESSION['errorCaptcha']);
        }

//      checking for uploads
        $add =  $this->headerKeys($data);

            $check =  $this->fileCheck($add);
            $add['show'] = $check['show'];
            $add['add'] = $check['add'];

        $this->builder->insert($this->table,['form_id'=>$data['id'], 'income'=>$add['add'],"mail"=>$data['Email']]);

        $form = $this->builder->getOne($this->tableJoin,$data['id']);

        if(!empty(trim($form->messageG)))
        {

        if(preg_match_all('/\#[a-zA-Z_\[\]0-9]+/',trim($form->messageG),$match,PREG_OFFSET_CAPTURE))
        {
            $indexs = [];

            if(count($match[0])>1)

                foreach ($match[0] as $val)
                {
                       $index =  str_replace("#","",$val[0]);
                       $index =  str_replace("[]","",$index);
                       if(is_array($data[$index]))
                            $indexs[$index] = implode(',',$data[$index]);
                        else
                           $indexs[$index] = $data[$index];

                }
            else {
                $index =  str_replace("#","",$match[0][0][0]);
                $index =  str_replace("[]","",$index);
                $indexs[$index] = $data[$index];
            }

            $message = str_replace('[]',"",$form->messageG);

                foreach ($indexs as $search=>$replace)
                {
                    $message = str_replace("#$search",$replace,$message);
                }
            }
            if(isset($data['Email']) && !empty($data['Email']))
                $this->mailer->sendMail($form->form_name,$message,$data['Email']);
        }

        return $add;
    }

    protected function headerKeys($data)
    {
        $return = [];
        $add = "";
        foreach ($data as $key=>$val)
        {
            if(is_array($val))
                $data[$key."[]"] = implode(', ',$val);
        }
        $form = $this->builder->getOne($this->tableJoin,$data['id']);
        $structure = $form->structure;
        $structure = explode(",",$structure);
        foreach ($structure as $val)
        {
            $val = explode('=>',$val);
            array_push($return,['key'=>trim($val[1]), 'val'=>$val[0], 'data'=>$data[trim($val[1])]]);
        }

        return $return;
    }
    protected function fileCheck($data)
    {
        $return = [];
        $DB = "";
        foreach ($data as $val)
        {
            if(preg_match('/fileInputName_[0-9]+/',$val['key'],$matches,PREG_OFFSET_CAPTURE))
            {
                $val['data'] = $this->uploadFile($_FILES[$matches[0][0]]);
            }

            $DB .= $val['key']."=>".$val['data']." @#@ ";
            $return[] = $val;
        }
        $DB = rtrim($DB, ' @#@ ');
        return ["show"=>$return,"add"=>$DB];
    }
    public function uploadFile($file){
        $target_dir = "web/uploads/";
        $temp = explode(".", basename($file["name"]));
        $newfilename = $temp[0]."----".round(microtime(true)) . '.' . end($temp);
        $target_file = $target_dir . $newfilename;
        $uploadOk = 1;
// Check file size
        if ($file["size"] > 10000000) {
            echo "Sorry, your file is too large.";
        }


// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return $newfilename;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    public function resumeCreate($data)
    {
        $html = "<h3 style='text-align: center;'>Full info</h3><table  style='font-family: arial, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='border: 1px solid #dddddd;text-align: left;padding: 8px;'>Id</th><th style='border: 1px solid #dddddd;text-align: left;padding: 8px;'>Information</th><th style='border: 1px solid #dddddd;text-align: left;padding: 8px;'>Value</th></tr>";
        $num=1;
        foreach($data['resume'] as $info)
        {
            $info =  explode("=>",$info);
            $img = explode(".",$info[1]);
            $imgType =  $img[count($img)-1];
            $imgTypes = ['JPG','jpg','PNG','png','CSV','csv'];
            $imgType = preg_replace("/\s+/","",$imgType);

                if(array_search($imgType,$imgTypes))
                    $info[1] = "<img style='width: 200px' src='http://".$_SERVER['SERVER_NAME']."/web/uploads/".$info[1]."'/>";

            if($num%2==0)
                $html .="<tr><td style='border: 1px solid #dddddd;text-align: left;padding: 8px;'>$num</td><td style='border: 1px solid #dddddd;text-align: left;padding: 8px;'>$info[0]</td><td>$info[1]</td></tr>";
            else
                $html .="<tr style='background-color: #dddddd;'><td style='border: 1px solid #dddddd;text-align: left;padding: 8px;'>$num</td><td style='border: 1px solid #dddddd;text-align: left;padding: 8px;'>$info[0]</td><td>$info[1]</td></tr>";
            $num++;
        }
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
// Output the generated PDF to Browser
        $this->dompdf->stream();
    }
    public function status($datas,$status)
    {
        if($status=='delete')
          foreach ($datas as $id){
              $file = $this->builder->getOne($this->table,$id);
              $datas = explode("@#@",$file->income);
              foreach ($datas as $data)
              {
                  $info = explode("=>",$data);
                  $key = $info[0];
                  if(preg_match("/file/i", $key))
                      if(preg_replace("/\s+/","",$info[1])){
                          $file = preg_replace(["/^\s+/","/\s+$/"],"",$info[1]);
                            if(file_exists("web/uploads/$file"))
                              unlink("web/uploads/$file");
                      }
                }
              $this->builder->delete($this->table,$id);
          }
        elseif ($status=='disable')
            foreach ($datas as $id){
                $this->builder->update($this->table,[
                    'id'=>$id,
                    'status'=>-1,
                ]);
            }
        elseif ($status=='active')
            foreach ($datas as $id){
                $this->builder->update($this->table,[
                    'id'=>$id,
                    'status'=>1,
                ]);
            }
    }
}