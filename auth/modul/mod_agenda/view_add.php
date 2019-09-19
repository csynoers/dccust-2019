<?php
    echo "
        <div class='col-sm-12'>
            <div class='panel panel-primary'>
                <div class='panel-heading'>
                    <H4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Add Informasi Agenda</H4>
                </div>
                <div class='panel-body'>
                    <form method='POST' enctype='multipart/form-data' action='?module={$this->module}&act=store'>
                        <div class='container-fluid'>
                            <div class='form-group'>
                                <label for='judul'>Judul :</label>
                                <input placeholder='Masukan Judul ...' name='nama_agenda_ina' type='text' value='' class='form-control' required>
                            </div>
                            <div class='form-group'>
                                <label for='tema_agenda'>Tema Agenda :</label>
                                <input placeholder='Masukan tema agenda ...' name='tema_agenda_ina' type='text'  class='form-control' required>
                            </div>
                            <div class='form-group'>
                                <label for='waktu_pelaksanaan'>Waktu Pelaksanaan :</label>
                                <input name='waktu' type='date' class='form-control' required>
                            </div>
                            <div class='form-group'>
                                <label for='peserta'>Peserta :</label>
                                <input placeholder='Masukan jumlah atau jenis peserta ...'  name='peserta' type='text' class='form-control' required>
                            </div>
                            <div class='form-group'>
                                <label for='lokasi'>Lokasi :</label>
                                <input placeholder='Masukan tempat atau lokasi ...' name='lokasi' type='text' class='form-control' required>
                            </div>
                            <div class='form-group'>
                                <label for='deskripsi'>Deskripsi :</label>
                                <textarea name='isi_agenda_ina' id='jogmce' class='form-control' ></textarea>
                            </div>
                            <div class='form-group'>
                                <label for='change_thumbnail'>Thumbnail :</label>
                                <input type='file' name='gambar' required>
                            </div>
                            <div class='form-group'>
                                <div class='alert alert-info'>
                                    <strong>Info! </strong> File Type: *.jpg File Size: max-width: 1024 px.
                                </div>
                            </div>
                        </div>

                        <input type='hidden' name='operation' value='insert'>
                        <button type='submit' class='btn btn-primary'>Publish</button>
                        <button type='button' class='btn btn-primary' onclick='self.history.back()'>Back</button>
                    </form>
                </div>
            </div>
        </div>
    ";