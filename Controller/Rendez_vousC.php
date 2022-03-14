<?php 
    include "../config.php";
    class Rendez_vousC {
       /* public function afficher_rendez_vous ($rendez_vous): void {
            echo("<br>");
            $tab = array (
                "ID"=>$rendez_vous->id_rendez_vous , 
                "Date"=>$rendez_vous->date_rendez_vous , 
                "Description"=>$rendez_vous->description_rendez_vous,
            );
            echo("<table border='1' align='center'><tr>");
            foreach ($tab as $key=>$value)
                echo ("<th>$key</th>");
            echo "</tr><tr>";
            foreach ($tab as $key=>$value)
                echo ("<td>$value</td>");
            echo("</tr></table>");
        }*/

        function afficher_rendez_vous(){
            $sql="SELECT * FROM rv";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }

        function ajouter_rendez_vous($rendez_vous){
            $sql="INSERT INTO rv (CIN_Etudiant,Email,Description_rv) 
			VALUES (:CIN_Etudiant,:Email,:Description_rv )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				   'CIN_Etudiant' =>$rendez_vous->getCIN_Etudiant(), 
                   'Email' =>$rendez_vous->getEmail(),
                   'Description_rv' =>$rendez_vous->getDescription_rv(),
                   
                  
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

        function supprimer_rendez_vous($id_rv){
			$sql="DELETE FROM rv WHERE id_rv=:id_rv";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_rv', $id_rv);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
        }

        function recupererRendez_vous($CIN_Etudiant){
			$sql="SELECT * from rv where CIN_Etudiant=$CIN_Etudiant";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$adherent=$query->fetch();
				return $adherent;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

        function maj_rendez_vous($rendez_vous, $CIN_Etudiant){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE rv SET 
						CIN_Etudiant= :CIN_Etudiant, 
						Email= :Email, 
						Description_du_rendez_vous= :Description_du_rendez_vous, 

					WHERE CIN_Etudiant= :CIN_Etudiant'
				);
				$query->execute([
					'CIN_Etudiant' => $rendez_vous->getCIN_Etudiant(),
					'Email' => $rendez_vous->getEmail(),
					'Description_du_rendez_vous' => $rendez_vous->getDescription_rendez_vous(),
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function trier_rv()
		{
			$sql = "SELECT * from rv ORDER BY id_rv DESC";
			$db = config::getConnexion();
			try {
				$req = $db->query($sql);
				return $req;
			} 
			catch (Exception $e)
			 {
				die('Erreur: ' . $e->getMessage());
			}
		}

    }
    ?>