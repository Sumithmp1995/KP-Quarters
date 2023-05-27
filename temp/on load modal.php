on load modal 



    <script type="text/javascript">
        window.onload = function() {
            OpenBootstrapPopup();
        };
        function OpenBootstrapPopup() {
            $("#InitialSetupPageOnload").modal('show');
        }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="InitialSetupPageOnload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-bg-warning">
                    <h5 class="modal-title" id="exampleModalLabel"> Initial Set-Up </h5>
                </div>
                <div class="modal-body">
                    <h4> Things to Consider When Registering Profiles</h4>
                    <b> 1. Do not skip the stages / Refresh the page until successfully complete profile registration. <br>
                        2. Add Profile details carefully. <br>
                        3. All Fields are mandatory. <br>
                        4. There is 2 Stages for Initializing KP Quarters Application for your Unit, they are as follows
                        <br> </b>
                    &nbsp I. Add Unit Head Profile
                    &nbsp II. Quarter Marshal Registration <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Continue</button>
                </div>
            </div>
        </div>
    </div>