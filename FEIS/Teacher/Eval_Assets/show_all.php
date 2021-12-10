<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";

  $id = $_POST['userid'];
    // code...
    $com = $teacher = NULL;
    $Total_A = $Total_B = $Total_C = $Total_D = $Total_E = NULL;

  try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $queryA = "SELECT * FROM a WHERE A_ID ='".$id."'";


        if ($resultA = $conn->query($queryA)) {
            while ($rowA = $resultA->fetch(PDO::FETCH_ASSOC)) {
              $Total_A = $rowA['TOTAL'];

              $queryB = "SELECT * FROM b WHERE B_ID ='".$id."'";
                if ($resultB = $conn->query($queryB)) {
                    while ($rowB = $resultB->fetch(PDO::FETCH_ASSOC)) {
                      $Total_B = $rowB['Total'];

                      $queryC = "SELECT * FROM c WHERE C_ID ='".$id."'";

                        if ($resultC = $conn->query($queryC)) {
                            while ($rowC = $resultC->fetch(PDO::FETCH_ASSOC)) {
                              $Total_C = $rowC['Total'];

                              $queryD = "SELECT * FROM d WHERE D_ID ='".$id."'";

                                if ($resultD = $conn->query($queryD)) {
                                    while ($rowD = $resultD->fetch(PDO::FETCH_ASSOC)) {
                                      $Total_D = $rowD['Total'];

                                      $queryE = "SELECT * FROM e WHERE E_ID ='".$id."'";

                                        if ($resultE = $conn->query($queryE)) {
                                            while ($rowE = $resultE->fetch(PDO::FETCH_ASSOC)) {
                                              $Total_E = $rowE['Total'];

                                              echo "
                                              <script type='text/javascript'>
                                            	var pie = document.getElementById('Pie').getContext('2d');
                                            	var crt = new Chart(pie, {
                                            		type: 'pie',
                                            		data: {
                                            			labels: [
                                            				'A: Start Up',
                                            				'B: Body',
                                            				'C: Assessment/Exercies',
                                            				'D: Conclusion',
                                            				'E: Relationship'
                                            			],
                                            			datasets: [{
                                            				label: 'My First Dataset',
                                            				data: ['".$Total_A."', '".$Total_B."', '".$Total_C."', '".$Total_D."','".$Total_E."'],
                                            				backgroundColor: [
                                            					'rgb(255, 99, 132)',
                                            					'rgb(255, 159, 64)',
                                            					'rgb(255, 205, 86)',
                                            					'rgb(75, 192, 192)',
                                            					'rgb(54, 162, 235)'
                                            				],
                                            				hoverOffset: 7
                                            			}]
                                            		}
                                            	});
                                            	</script>
                                              ";

                                            }
                                          }

                                    }
                                  }


                            }
                          }


                    }
                  }


            }
          }


  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }

  ?>
