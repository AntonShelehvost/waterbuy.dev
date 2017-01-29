<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
<?php } ?>
</div><!--/fluid-row-->
<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>


    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="#" target="_blank">Anton Shelehvost</a> 2016
            - <?php echo date('Y') ?></p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://Waterbuy.net">Waterbuy.net</a></p>
    </footer>
<?php } ?>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


<? if (isset($message_email_confirm) && $message_email_confirm) { ?>
    <div id="email_confirm" class="modal fade  modal-sm" role="dialog" style="position: fixed;
    top: 50% !important;
    left: 50%;">
        <div class="modal-dialog modal-sm" role="document">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Подтверждение регистрации</h4>
                </div>
                <div class="modal-body">
                    <p><?= $message_email_confirm ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#email_confirm').modal('show').css(
                {
                    'margin-top': function () {
                        return -($(this).height() / 2);
                    },
                    'margin-left': function () {
                        return -($(this).width() / 2);
                    }
                });
        });
    </script>
<? } ?>
<!-- library for cookie management -->
<script src="/assets/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='/assets/bower_components/moment/min/moment.min.js'></script>
<script src='/assets/bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='/assets/js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="/assets/bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="/assets/bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="/assets/js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="/assets/bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="/assets/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="/assets/js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="/assets/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="/assets/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="/assets/js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="/assets/js/jquery.history.js"></script>

<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
<script src="/assets/js/jquery.mask.js"></script>
<script src="/assets/js/phonecode.js"></script>
<!-- application script for Charisma demo -->
<script src="/assets/js/charisma.js?<?= filemtime('./assets/js/charisma.js') ?>"></script>
<script src="http://cdn.rawgit.com/RobinHerbots/jquery.inputmask/3.2.7/dist/min/jquery.inputmask.bundle.min.js"
        type="text/javascript"></script>
<script
    src="/assets/js/jquery.inputmask-multi.min.js?<?= filemtime('./assets/js/jquery.inputmask-multi.min.js') ?>"></script>
<script src="/assets/js/masked.js?<?= filemtime('./assets/js/masked.js') ?>"></script>
</body>
</html>