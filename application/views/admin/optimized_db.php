<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Optimized Database</h3>
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
                <pre class="text-success">Database Size : <?php echo number_format($db_size, '2', '.', ','); ?>KB<br>Overhead : <?php echo number_format($db_overhead, '2', '.', ','); ?>B<br>Last Optimized : <?php echo date('l, d M Y - h:i A', strtotime($db_last_optimized)); ?></pre>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php echo form_open(current_url()); ?>
                <div class="row">
                    <div class="col-lg-3">
                        <button type="submit" name="optimized_db" value="optimized" class="btn btn-outline btn-default">Optimized</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>