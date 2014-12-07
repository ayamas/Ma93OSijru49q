<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Perform Backup</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p>Perform Backup for the database and application. This is a MANUAL backup.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if (!empty($message)) { ?>
                    <div id="message">
                        <br>
                        <?php echo $message; ?>
                    </div>
                <?php } ?>
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Backup List
                    </div>
                    <div class="panel-body">
                        <?php echo form_open(current_url()); ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date Created</th>
                                    <th>Backup Name</th>
                                    <th style="text-align: center; width: 180px;">Backup Type</th>
                                    <th style="text-align: center; width: 150px;">Operation</th>
                                </tr>
                            </thead>
                            <?php if (!empty($results)) { ?>
                                <tbody>
                                    <?php foreach ($results as $result) { ?>
                                        <tr>
                                            <td>
                                                <?php
                                                //echo $result['created_date'];
                                                $created_date = strtotime($result['created_date']);
                                                $dmy = date('d M Y', $created_date);
                                                $his = date('g:i A', $created_date);
                                                echo $dmy . '<br>' . $his;
                                                ?>
                                            </td>  
                                            <td>
                                                <?php if ($result['backup_location'] == 'backups/databases/') { ?>
                                                    <a href="<?php echo base_url() . 'backup/download_db_file/' . $result['backup_id']; ?>">
                                                        <?php echo $result['backup_name']; ?>
                                                    </a>

                                                <?php } else { ?>
                                                    <a href="<?php echo base_url() . 'backup/download_site_file/' . $result['backup_id']; ?>">
                                                        <?php echo $result['backup_name']; ?>
                                                    </a>
                                                <?php } ?>

                                            </td>
                                            <td style="text-align: center;">
                                                <?php
                                                if ($result['backup_location'] == 'backups/databases/') {
                                                    echo 'Database';
                                                } else {
                                                    echo 'Site';
                                                }
                                                //echo $result['backup_location']; 
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php if ($result['backup_location'] == 'backups/databases/') { ?>
                                                    <a href="<?php echo base_url() . 'backup/delete_db_file/' . $result['backup_id']; ?>">
                                                        Delete
                                                    </a>

                                                <?php } else { ?>
                                                    <a href="<?php echo base_url() . 'backup/delete_site_file/' . $result['backup_id']; ?>">
                                                        Delete
                                                    </a>
                                                <?php } ?>                                               
                                            </td>



                                        </tr>
                                    <?php } ?>
                                </tbody>
                            <?php } else { ?>
                                <tbody>
                                    <tr>
                                        <td colspan="4">
                                            No backup are available.
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Perform Backup
                    </div>
                    <div class="panel-body">
                        <?php echo form_open($this->uri->uri_string()); ?>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Backup Type</label>
                                    <select name="backup_type" class="form-control">
                                        <option value="" selected disabled>Backup Type</option>
                                        <option value="1" <?php echo (isset($success) && strlen($success) ? '' : (set_value('backup_type') == '1' ? 'selected' : '')) ?>>Database Backup</option>
                                        <option value="2" <?php echo (isset($success) && strlen($success) ? '' : (set_value('backup_type') == '2' ? 'selected' : '')) ?>>Site Backup</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>File Type</label>
                                    <select name="file_type" class="form-control">
                                        <option value="" selected disabled>File Type</option>
                                        <option value="1" <?php echo (isset($success) && strlen($success) ? '' : (set_value('file_type') == 1 ? 'selected' : '')) ?>>ZIP</option>
                                        <option value="2" <?php echo (isset($success) && strlen($success) ? '' : (set_value('file_type') == 2 ? 'selected' : '')) ?>>GZIP</option>
                                    </select>  
                                </div>
                                <hr>
                                <button type="submit" name="backup" value="backup" class="btn btn-outline btn-default">Get Backup</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>