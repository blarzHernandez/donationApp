
<h4>My Donations Made</h4>
<table id="donationsTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Donation_id</th>
                <th>Recipient</th>
                <th>Amount</th>
                <th>Country</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>          
           
        </tbody>
    </table>


<script>

$(document).ready(function () {
            var table = $('#donationsTable').DataTable(
                    {
                        dom: "Bfrtip",
                        bProcessing: true,
                        select: {
                            style: 'os'
                        },
                        order: [[1, 'desc']],
                        aoColumns: [
                            null,
                            null,                           
                            null,
                            null,
                            null
                        ],
                        ajax: {
                            url: '<?php echo base_url("Donations/getMyDonations"); ?>',
                            error: function (xhr, status, error) {
                                mensajeAlert(xhr.responseText, "Alerta!");
                            }
                        }
                    }
               
            )});
</script>