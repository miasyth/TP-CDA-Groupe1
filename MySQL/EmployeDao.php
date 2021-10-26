<?php
require_once '../dto/Employe.php';
require_once '../dto/Service.php';
require_once '../service/ConnexionSingleton.php';

class EmployeDao
{
    private ?PDO $connexion = null;

    public function __construct(?PDO $connexion = null)
    {
        if ($this->connexion == null) {
            $this->connexion = ConnexionSingleton::getConnexion();
        } else {
            $this->connexion = $connexion;
        }
    }

    public function update(Employe $newEmploye): Employe
    {
        $sql = "UPDATE emp 
                set noemp=:numeroEmployeParam,
                    nom=:nomParam, 
                    prenom=:prenomParam,
                    emploi=:emploiParam,
                    sup=:supParam,
                    embauche=:embaucheParam,
                    sal=:salParam, 
                    comm=:commParam, 
                    noserv=:noservParam
                where noemp = :numeroEmployeParam";

        $preparedQuery = $this->connexion->prepare($sql);

        $numeroEmploye = $newEmploye->getNumeroEmploye();
        $nom = $newEmploye->getNom();
        $prenom = $newEmploye->getPrenom();
        $emploi = $newEmploye->getEmploi();

        $sup = $newEmploye->getSuperieur()->getNumeroEmploye();
        $dateEmbauche = $newEmploye->getDateEmbauche();
        $salaire = $newEmploye->getSalaire();
        $commission = $newEmploye->getCommission();
        $noserv = $newEmploye->getService()->getNumeroService();
        $preparedQuery->bindParam(':numeroEmployeParam', $numeroEmploye);
        $preparedQuery->bindParam(':nomParam', $nom);
        $preparedQuery->bindParam(':prenomParam', $prenom);
        $preparedQuery->bindParam(':emploiParam', $emploi);
        $preparedQuery->bindParam(':supParam', $sup);
        $preparedQuery->bindParam(':embaucheParam', $dateEmbauche);
        $preparedQuery->bindParam(':salParam', $salaire);
        $preparedQuery->bindParam(':commParam', $commission);
        $preparedQuery->bindParam(':noservParam', $noserv);
        $preparedQuery->execute();

        return  $newEmploye;
    }

    public function getById(?int $numeroEmploye): Employe
    {
        $sql =  "select * from emp as e where e.noemp=$numeroEmploye";
        $row = $this->connexion->query($sql)->fetch(PDO::FETCH_ASSOC);
        $EmployeEnCours = new Employe($row['noemp'], $row['nom'], $row['prenom'], $row['emploi'], null, $row['embauche'], $row['sal'], $row['comm'], null);
        //recuperer le superieur
        $superieur = null;
        if ($row['sup'] != null)
            $superieur = new Employe($row['sup']);

        $EmployeEnCours->setSuperieur($superieur);
        //recuperer le service
        $service = new Service($row['noserv']);
        $EmployeEnCours->setService($service);
        
        return  $EmployeEnCours;
    }

    public function getAll(): array
    {
        $sql =  "select * from emp as e";
        $resultset = $this->connexion->query($sql);
        $resultats = [];
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            $EmployeEnCours = new Employe();
            $EmployeEnCours->setNumeroEmploye($row['noemp']);
            $EmployeEnCours->setNom($row['nom']);
            $EmployeEnCours->setPrenom($row['prenom']);
            $EmployeEnCours->setEmploi($row['emploi']);
            //$EmployeEnCours->getSup($row['sup']);
            $superieur = new Employe($row['sup']);
            $EmployeEnCours->setSuperieur($superieur);
            $EmployeEnCours->setDateEmbauche($row['embauche']);
            $EmployeEnCours->setSalaire($row['sal']);
            $EmployeEnCours->setCommission($row['comm']);
            //$EmployeEnCours->setNoserv($row['noserv']);
            $monService = new Service($row['noserv']);
            $EmployeEnCours->setService($monService);
            $resultats[] = $EmployeEnCours;
        }
        return $resultats;
    }

    public function deleteById(?int $numeroEmploye)
    {
        $sql =  "delete from emp as e where e.noemp=:numeroEmployeParam";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':numeroEmployeParam', $numeroEmploye);
        $preparedQuery->execute();
    }


    function save(Employe $newEmploye): Employe
    {
        //1er étape : récuperer un id à partir de la sequence seq_emp
        $sql = "select nextval('seq_emp') as next_id;";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
        $row = $preparedQuery->fetch();
        $nextId = $row['next_id'];

        //2éme étape : mettre à jour le numero de l'employe dans l'objet Employe 
        $newEmploye->setNumeroEmploye($nextId);

        //3eme étape : persister l'objet Employe en BDD
        $sql = "INSERT INTO emp (noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv) VALUES(:numeroEmployeParam,:nomParam, :prenomParam, :emploiParam, :supParam, :embaucheParam, :salParam, :commParam, :noservParam)";
        $preparedQuery = $this->connexion->prepare($sql);

        $nom = $newEmploye->getNom();
        $prenom = $newEmploye->getPrenom();
        $emploi = $newEmploye->getEmploi();
        //$sup = $newEmploye->getSup($newEmploye->setSup($emploi));
        $superieur = $newEmploye->getSuperieur()->getNumeroEmploye();
        $dateEmbauche = $newEmploye->getDateEmbauche();
        $salaire = $newEmploye->getSalaire();
        $commission = $newEmploye->getCommission();
        //$noserv = $newEmploye->getNoserv();
        $noserv = $newEmploye->getService()->getNumeroService();
        $preparedQuery->bindParam(':numeroEmployeParam', $nextId);
        $preparedQuery->bindParam(':nomParam', $nom);
        $preparedQuery->bindParam(':prenomParam', $prenom);
        $preparedQuery->bindParam(':emploiParam', $emploi);
        $preparedQuery->bindParam(':supParam', $superieur);
        $preparedQuery->bindParam(':embaucheParam', $dateEmbauche);
        $preparedQuery->bindParam(':salParam', $salaire);
        $preparedQuery->bindParam(':commParam', $commission);
        $preparedQuery->bindParam(':noservParam', $noserv);
        $preparedQuery->execute();

        return  $newEmploye;
    }
    /**
     * Get the value of connexion
     *
     * @return  PDO
     */
    public function getConnexion(): PDO
    {
        return $this->connexion;
    }

    /**
     * Set the value of connexion
     *
     * @param   PDO  $connexion  
     *
     * @return  self
     */
    public function setConnexion(PDO $connexion)
    {
        $this->connexion = $connexion;
    }
}
