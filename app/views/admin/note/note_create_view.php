<?php $this->layout('layout/layout',['status'=>true,'url'=>$url,'webName'=>$webName]) ?>
<section class="content">
    <style>
        label{
            font-style: italic;
        }
    </style>
        <div class="container-fluid">
            <br>
            <h3>Create note</h3>
            <hr>
            <form action="<?
            if(!(isset($note->subject) && !empty($note->subject))):
                echo "/note-create/";
            else:
                echo "/note-update/"; endif; ?>"
            method="post">
                <? if((isset($note->subject) && !empty($note->subject))):
                echo "<input name='id' value='".$note->id."' type='hidden'>";endif; ?>

                <div class="container-fluid">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <label for="noteHeader">Header of note</label>
                            <input type="text" class="form-control" value="<?= $note->subject ?>" name="subject"/>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <label for="noteDesc">Note description</label>
                            <textarea name="content" id="content" class="form-control" rows="10"><?= $note->content ?></textarea>
                            <hr>
                            <button class="btn btn-outline-success" style="width: 100%;">Save</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>