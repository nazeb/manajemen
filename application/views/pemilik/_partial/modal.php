    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik tombol "Logout" untuk melanjutkan proses logout.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="" id="logout_link">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik tombol "Delete" jika anda yakin ingin menghapus data.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="" id="delete_link_m_n">Delete</a>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        function func_logout(logout_url){
            jQuery('#logoutModal').modal('show', {backdrop: 'static',keyboard :false});            
            document.getElementById('logout_link').setAttribute("href" , logout_url);
            document.getElementById('logout_link').focus();
        }

        function func_delete(delete_url){
            jQuery('#deleteModal').modal('show', {backdrop: 'static',keyboard :false});            
            document.getElementById('delete_link_m_n').setAttribute("href" , delete_url );
            document.getElementById('delete_link_m_n').focus();
        }
    </script>