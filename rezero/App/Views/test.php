
#-- GESTION MODIFICATION DE VOYAGE ---------------------------------------------------------
    public function editVoyage($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleEditVoyages($id);
        } else {
            $this->getVoyage($id);
        }
    }
    #-- GESTION SUPPRESSION DE VOYAGE ---------------------------------------------------------
    public function handleEditVoyages($id) {
        // Récupérer et assainir les données du formulaire
        $productTitle = htmlspecialchars($_POST['product_title']);
        $idProduit = intval($_POST['id_produit']);
        $prix = floatval($_POST['prix']);
        $etapesVoyage = htmlspecialchars($_POST['etapes_voyage']);
        $category = htmlspecialchars($_POST['category']);
        $saison = htmlspecialchars($_POST['saison']);
        $transport = htmlspecialchars($_POST['transport']);
        $region1 = htmlspecialchars($_POST['region1']);
        $region2 = !empty($_POST['region2']) ? htmlspecialchars($_POST['region2']) : null;
        $itinerary = htmlspecialchars($_POST['itinerary']);
        $duration = intval($_POST['duration']);
        $descriptionVoyage = htmlspecialchars($_POST['description_voyage']);
    
        // Gérer l'upload de l'image dans le Dossier Img/upload si une nouvelle image est téléchargée
        $imageId = null;
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image'];
            $imagePath = ROOT_PATH . 'public/assets/img/uploads/' . uniqid() . '_' . basename($image['name']); 
    
            if (move_uploaded_file($image['tmp_name'], $imagePath)) {
                // Insérer l'image dans la table images
                $stmt = $this->db->prepare("INSERT INTO images (file_name, file_path) VALUES (?, ?)");
                if ($stmt->execute([$image['name'], $imagePath])) {
                    $imageId = $this->db->lastInsertId();
                } else {
                    echo "Erreur lors de l'insertion de l'image dans la base de données.";
                    return;
                }
            } else {
                echo "Erreur lors du téléchargement de l'image.";
                return;
            }
        }
    
        // Mettre à jour le voyage dans la table voyages
        $sql = "
            UPDATE voyages 
            SET product_title = ?, id_produit = ?, prix = ?, etapes_voyage = ?, category = ?, saison = ?, transport = ?, region1 = ?, region2 = ?, itinerary = ?, duration = ?, description_voyage = ? " .
            ($imageId ? ", image_id = ? " : "") .
            "WHERE id = ?";
        
        $params = [
            $productTitle, $idProduit, $prix, $etapesVoyage, $category, $saison, $transport, $region1, $region2, $itinerary, $duration, $descriptionVoyage
        ];
        
        if ($imageId) {
            $params[] = $imageId;
        }
        
        $params[] = $id;
    
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute($params)) {
            // Rediriger après succès
            header('Location: ' . URL . 'admin/listingVoyages');
            exit;
        } else {
            echo "Erreur lors de la mise à jour du voyage.";
        }
    }