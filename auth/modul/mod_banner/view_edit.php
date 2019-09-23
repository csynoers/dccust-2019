<?php
    foreach ($rows as $key => $value) {
        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Informasi Banner</h4>
                    </div>
                    <div class='panel-body'>
                        <form method='POST' enctype='multipart/form-data' action='?module={$this->url->module}&act=store'>
                            <div class='container-fluid'>
								<div class='form-group'>
									<label for='judul'>Judul :</label>
									<input name='judul' type='text' value='{$value->judul}' class='form-control' id='judul' placeholder='Judul banner ...' required>
								</div>
								<div class='form-group'>
									<label for='link'>Link :</label>
									<input name='link' type='text' value='{$value->link}' class='form-control' id='link' placeholder='Link Slideshow jika ada jika tidak cukup masukan tanda #' required>
								</div>
								<div class='form-group'>
									<label>Thumbnail :</label>
									<img class='img-responsive' src='{$this->config->img[$this->url->module]['dir']}{$value->gambar}'>
								</div>
								<div class='form-group'>
									<label>Change Thumbnail :</label>
									<input type='file' name='gambar'>
								</div>
								<div class='form-group'>
									<div class='alert alert-info'>
										<strong>Info!</strong> images max-width: 512px.
									</div>
								</div>
                                
                            </div>

                            <input type='hidden' name='id' value='{$value->id}'>
                            <input type='hidden' name='operation' value='update'>
                            <button type='submit' class='btn btn-primary'>Update</button>
                            <button type='button' class='btn btn-primary' onclick='self.history.back()'>Back</button>
                        </form>
                    </div>
                </div>
            </div>
        ";
    }