<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js" ></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <style>
        #whatToPrint{
            width:40%;
            margin: auto;
        }
    </style>
    <link rel="icon" href="idea(2).png" sizes="300x300" >
</head>
<body>
    <?php
    
    include('../Database/db.php');
    $id=$_GET['pdfid'];
    $sql="select * from bills where sno='$id'";
    $res=mysqli_query($con,$sql);
    
    $row=mysqli_fetch_assoc($res);
    echo'<div id="whatToPrint">
    <table class="table-info table-hover table" >
    <tr><td> <img src ="idea (2).png" width=100></td>
    <td ><h3 >Electricity Bill</h4></td>
    </tr>
    
    <tr class="table-light">
    <td class="table-light">Customer Id</td>
    <td class="table-light">'.$row['cid'].'</td>
    </tr>
    <tr class="table-light">
    <td class="table-light">Bill Id</td>
    <td class="table-light">'.$row['bid'].'</td>
    </tr>
    <tr class="table-light">
    <td class="table-light">Name</td>
    <td class="table-light">'.$row['cname'].'</td>
    </tr>
    <tr class="table-light">
    <td class="table-light">Unit</td>
    <td class="table-light">'.$row['unit'].'</td>
    </tr>
    <tr class="table-light">
    <td class="table-light">Amount</td>
    <td class="table-light">'.$row['amount'].'</td>
    </tr>
    <tr class="table-light">
    <td class="table-light">Payment Id</td>
    <td class="table-light">'.$row['payment_id'].'</td>

    </tr>
    <tr class="table-light">
    <td class="table-light">Paytime</td>
    <td class="table-light">'.$row['paytime'].'</td>
    </tr>
    <tr class="table-light">
    <td class="table-light">Status</td>
    <td class="table-light">'.$row['status'].'</td>
    </tr>
 </table></div>';
    ?>
    <p align='center'><button class='btn btn-success' href='javascript:generatePDF()' id='download1'><a href='javascript:generatePDF()' id='download' class='text-light text-decoration-none'>Download</a></button></p>
    
</body>
<script type="text/javascript">
        document.getElementById("download1").click();
    </script>
<script>

        async function generatePDF() {
            // document.getElementById("download").innerHTML = "Waiting";

            //Downloading
            var downloading = document.getElementById("whatToPrint");
            var bid=document.getElementById("bid");
            var doc = new jsPDF('p', 'pt');

            await html2canvas(downloading, {
                allowTaint: true,
                useCORS: true,
                width:  2300,
                height: 1400
            }).then((canvas) => {
                //Canvas (convert to PNG)
                doc.addImage(canvas.toDataURL("image/png"), 'PNG', 55,55, 1880, 1880);
            })

            doc.save("ebill.pdf");

            //End of downloading        
            window.location.href="<?php echo'paid_table.php';?>";
        }
    </script>
</html>