<?php
namespace App\models;

class Statistics
{
    /**
     * @var QueryBuilder
     */
    private $builder;
    private $tableNote='notes';
    private $tableMessage='messages';
    private $tableСandidates='candidate';
    private $tableForms='forms';

    public function __construct(QueryBuilder $builder)
    {
        $this->builder = $builder;
    }
    protected function messageCount()
    {
         $sql = "select max(id) as val from $this->tableMessage";
         return $this->builder->executeDB($sql);
    }
    protected function candidateCount()
    {
        $sql = "select count(id) as val from $this->tableСandidates WHERE status=1";
        return $this->builder->executeDB($sql);
    }
    protected function candidatesSuccess($date,$date2)
    {
        $sql = "select count(id) as val from $this->tableСandidates WHERE status=1 AND reg_date >= '".$date." 00:00:00' AND reg_date <= '".$date2." 23:59:59' ";
        return $this->builder->executeDB($sql);
    }
    protected function candidatesDisabled($date,$date2)
    {
        $sql = "select count(id) as val from $this->tableСandidates WHERE status=0 AND reg_date >= '".$date." 00:00:00' AND reg_date <= '".$date2." 23:59:59' ";
        return $this->builder->executeDB($sql);
    }
    protected function formCount()
    {
        $sql = "select max(id) as val from $this->tableForms";
        return $this->builder->executeDB($sql);
    }
    protected function noteCount()
    {
        $sql = "select max(id) as val from $this->tableNote";
        return $this->builder->executeDB($sql);
    }
    public function show($date = null)
    {

            return json_encode([
                'message'=>$this->messageCount(),
                'candidate'=>$this->candidateCount(),
                'diagram'=>[
                        'Jan'=>['suc'=>$this->candidatesSuccess($date."-01-01",$date."-01-31"),'inc'=>$this->candidatesDisabled($date."-01-01",$date."-01-31")],
                        'Feb'=>['suc'=>$this->candidatesSuccess($date."-02-01",$date."-02-30"),'inc'=>$this->candidatesDisabled($date."-02-01",$date."-02-30")],
                        'Mar'=>['suc'=>$this->candidatesSuccess($date."-03-01",$date."-03-31"),'inc'=>$this->candidatesDisabled($date."-03-01",$date."-03-31")],
                        'Apr'=>['suc'=>$this->candidatesSuccess($date."-04-01",$date."-04-30"),'inc'=>$this->candidatesDisabled($date."-04-01",$date."-04-30")],
                        'May'=>['suc'=>$this->candidatesSuccess($date."-05-01",$date."-05-31"),'inc'=>$this->candidatesDisabled($date."-05-01",$date."-05-31")],
                        'Jun'=>['suc'=>$this->candidatesSuccess($date."-06-01",$date."-06-30"),'inc'=>$this->candidatesDisabled($date."-06-01",$date."-06-30")],
                        'Jul'=>['suc'=>$this->candidatesSuccess($date."-07-01",$date."-07-31"),'inc'=>$this->candidatesDisabled($date."-07-01",$date."-07-31")],
                        'Aug'=>['suc'=>$this->candidatesSuccess($date."-08-01",$date."-08-30"),'inc'=>$this->candidatesDisabled($date."-08-01",$date."-08-30")],
                        'Sept'=>['suc'=>$this->candidatesSuccess($date."-09-01",$date."-09-31"),'inc'=>$this->candidatesDisabled($date."-09-01",$date."-09-31")],
                        'Oct'=>['suc'=>$this->candidatesSuccess($date."-10-01",$date."-10-31"),'inc'=>$this->candidatesDisabled($date."-10-01",$date."-10-31")],
                        'Nov'=>['suc'=>$this->candidatesSuccess($date."-11-01",$date."-11-30"),'inc'=>$this->candidatesDisabled($date."-11-01",$date."-11-30")],
                        'Dec'=>['suc'=>$this->candidatesSuccess($date."-12-01",$date."-12-31"),'inc'=>$this->candidatesDisabled($date."-12-01",$date."-12-31")]
                    ],
                'form'=>$this->formCount(),
                'note'=>$this->noteCount()
        ]);
    }
}