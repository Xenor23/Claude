<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Liste des Voyages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 20px;
            background: #f8f8f8;
        }
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col">
                <div class="e-tabs mb-3 px-3">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#">Admin</a></li>
                    </ul>
                </div>
                <div class="row flex-lg-nowrap">
                    <div class="col mb-3">
                        <div class="e-panel card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h6 class="mr-2"><span>Liste de Voyages</span></h6>
                                </div>
                                <div class="e-table">
                                    <div class="table-responsive table-lg mt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="align-top">
                                                        <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0">
                                                            <input type="checkbox" class="custom-control-input" id="all-items">
                                                            <label class="custom-control-label" for="all-items"></label>
                                                        </div>
                                                    </th>
                                                    <th>Titre</th>
                                                    <th class="max-width">Catégories</th>
                                                    <th class="sortable">Prix</th>
                                                    <th colspan="2">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($voyages as $voyage) : ?>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                <input type="checkbox" class="custom-control-input" id="item-<?= $voyage['id'] ?>">
                                                                <label class="custom-control-label" for="item-<?= $voyage['id'] ?>"></label>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center"><?= htmlspecialchars($voyage['product_title']) ?></td>
                                                        <td class="text-nowrap align-middle"><?= htmlspecialchars($voyage['category']) ?></td>
                                                        <td class="text-nowrap align-middle"><span><?= htmlspecialchars($voyage['prix']) ?>€</span></td>
                                                        <td class="text-center align-middle">
                                                            <div class="btn-group align-top">
                                                            <form action="<?= URL ?>admin/editVoyage" method="post" enctype="multipart/form-data">
                                                                <button class="btn btn-sm btn-outline-secondary badge btn-edit" type="button" data-voyage-id="<?= $voyage['id'] ?>">
                                                                    <i class="fa fa-edit"></i> Modifier
                                                                </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            <div class="btn-group align-top">
                                                                <form method="POST" action="<?= URL ?>admin/deleteVoyage/<?= $voyage['id'] ?>" style="display:inline;">
                                                                    <button class="btn btn-sm btn-outline-secondary badge" type="submit">
                                                                        <i class="fa fa-trash"></i> Supprimer
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center px-xl-3">
                                    <button class="btn btn-success btn-block" type="button" data-toggle="modal" data-target="#addVoyageModal">Ajouter</button>
                                </div>
                                <hr class="my-3">
                                <div class="e-navlist e-navlist--active-bold">
                                    <ul class="nav">
                                        <li class="nav-item active"><a href class="nav-link"><span>Total</span>&nbsp;<small>/&nbsp;<?= count($voyages) ?></small></a></li>
                                        <li class="nav-item"><a href class="nav-link"><span>Selectionné</span>&nbsp;<small>/&nbsp;0</small></a></li>
                                    </ul>
                                </div>
                                <hr class="my-3">
                                <div>
                                    <div class="form-group">
                                        <label>Rechercher:</label>
                                        <div><input class="form-control w-100" type="text" placeholder="Titre" value></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Add Voyage -->
                <div class="modal fade" role="dialog" tabindex="-1" id="addVoyageModal">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Nouveau voyage</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <form action="<?= URL ?>admin/addVoyages" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="add_product_title">Titre du voyage :</label>
                                            <input type="text" class="form-control" id="add_product_title" name="product_title" placeholder="Entrer le titre du voyage" required>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="add_id_produit">Référence voyage :</label>
                                                    <input type="number" class="form-control" id="add_id_produit" name="id_produit" placeholder="Entrer la référence du voyage" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="add_prix">Prix :</label>
                                                    <input type="number" class="form-control" id="add_prix" name="prix" placeholder="Entrer le prix" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="add_image">Image produit</label>
                                                    <input type="file" class="form-control-file" id="add_image" name="image" accept="image/*" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="add_etapes_voyage">Étapes du voyage :</label>
                                                    <input type="text" class="form-control" id="add_etapes_voyage" name="etapes_voyage" placeholder="Entrer les étapes du voyage" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="add_category" class="form-label">Catégorie :</label>
                                                    <select class="form-control" id="add_category" name="category" required>
                                                        <option selected disabled value="">Sélectionnez une catégorie</option>
                                                        <option value="Autotour">Autotour</option>
                                                        <option value="Circuit">Circuit</option>
                                                        <option value="Séjour">Séjour</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="add_saison" class="form-label">Saisonnalité :</label>
                                                    <select class="form-control" id="add_saison" name="saison" required>
                                                        <option selected disabled value="">Sélectionnez une saisonalité</option>
                                                        <option value="Mai/Juin">Mai/Juin</option>
                                                        <option value="Juillet/Août">Juillet/Août</option>
                                                        <option value="Sept/Oct">Sept/Oct</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="add_transport" class="form-label">Transport :</label>
                                                    <select class="form-control" id="add_transport" name="transport" required>
                                                        <option selected disabled value="">Séléctionnez le type de transport</option>
                                                        <option value="4x4">4x4</option>
                                                        <option value="Minibus">Minibus</option>
                                                        <option value="Bateau">Bateau</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="add_region1" class="form-label">Tag Région 1 :</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="add_region1_nord" name="region1" value="Nord" required>
                                                        <label class="form-check-label" for="add_region1_nord">Nord</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="add_region1_sud" name="region1" value="Sud" required>
                                                        <label class="form-check-label" for="add_region1_sud">Sud</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="add_region1_est" name="region1" value="Est" required>
                                                        <label class="form-check-label" for="add_region1_est">Est</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="add_region1_ouest" name="region1" value="Ouest" required>
                                                        <label class="form-check-label" for="add_region1_ouest">Ouest</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="add_region2" class="form-label">Tag Région 2 :</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="add_region2_nord" name="region2" value="Nord">
                                                        <label class="form-check-label" for="add_region2_nord">Nord</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="add_region2_sud" name="region2" value="Sud">
                                                        <label class="form-check-label" for="add_region2_sud">Sud</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="add_region2_est" name="region2" value="Est">
                                                        <label class="form-check-label" for="add_region2_est">Est</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="add_region2_ouest" name="region2" value="Ouest">
                                                        <label class="form-check-label" for="add_region2_ouest">Ouest</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="add_itinerary">Itinéraire (km) :</label>
                                                    <input type="text" class="form-control" id="add_itinerary" name="itinerary" placeholder="Entrer la distance de l'itinéraire en km" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="add_duration" class="form-label">Durée de Séjour :</label>
                                                    <select class="form-control" id="add_duration" name="duration" required>
                                                        <option selected disabled value="">Séléctionnez la durée de Séjour</option>
                                                        <option value="7Jours /6Nuits">7Jours /6Nuits</option>
                                                        <option value="14Jours /13Nuits">14Jours /13Nuits</option>
                                                        <option value="21Jours /20Nuits">21Jours /20Nuits</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="add_description_voyage">Description de voyage :</label>
                                            <textarea class="form-control" id="add_description_voyage" name="description_voyage" rows="4" placeholder="Entrer la description pour ce voyage" required></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </form>
                                </div><!-- Ici le formulaire AddVoyages -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Voyage -->
                <div class="modal fade" id="editVoyageModal" tabindex="-1" role="dialog" aria-labelledby="editVoyageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editVoyageModalLabel">Modifier Voyage</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editVoyageForm" action="<?= URL ?>admin/editVoyages" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="edit_product_title">Titre du voyage :</label>
                                        <input type="text" class="form-control" id="edit_product_title" name="product_title" placeholder="Entrer le titre du voyage" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="edit_id_produit">Référence voyage :</label>
                                                <input type="number" class="form-control" id="edit_id_produit" name="id_produit" placeholder="Entrer la référence du voyage" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_prix">Prix :</label>
                                                <input type="number" class="form-control" id="edit_prix" name="prix" placeholder="Entrer le prix" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_image">Image produit</label>
                                                <input type="file" class="form-control-file" id="edit_image" name="image" accept="image/*">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_etapes_voyage">Étapes du voyage :</label>
                                                <input type="text" class="form-control" id="edit_etapes_voyage" name="etapes_voyage" placeholder="Entrer les étapes du voyage" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_category" class="form-label">Catégorie :</label>
                                                <select class="form-control" id="edit_category" name="category" required>
                                                    <option selected disabled value="">Sélectionnez une catégorie</option>
                                                    <option value="Autotour">Autotour</option>
                                                    <option value="Circuit">Circuit</option>
                                                    <option value="Séjour">Séjour</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_saison" class="form-label">Saisonnalité :</label>
                                                <select class="form-control" id="edit_saison" name="saison" required>
                                                    <option selected disabled value="">Sélectionnez une saisonalité</option>
                                                    <option value="Mai/Juin">Mai/Juin</option>
                                                    <option value="Juillet/Août">Juillet/Août</option>
                                                    <option value="Sept/Oct">Sept/Oct</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_transport" class="form-label">Transport :</label>
                                                <select class="form-control" id="edit_transport" name="transport" required>
                                                    <option selected disabled value="">Séléctionnez le type de transport</option>
                                                    <option value="4x4">4x4</option>
                                                    <option value="Minibus">Minibus</option>
                                                    <option value="Bateau">Bateau</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="edit_region1" class="form-label">Tag Région 1 :</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="edit_region1_nord" name="region1" value="Nord" required>
                                                    <label class="form-check-label" for="edit_region1_nord">Nord</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="edit_region1_sud" name="region1" value="Sud" required>
                                                    <label class="form-check-label" for="edit_region1_sud">Sud</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="edit_region1_est" name="region1" value="Est" required>
                                                    <label class="form-check-label" for="edit_region1_est">Est</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="edit_region1_ouest" name="region1" value="Ouest" required>
                                                    <label class="form-check-label" for="edit_region1_ouest">Ouest</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_region2" class="form-label">Tag Région 2 :</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="edit_region2_nord" name="region2" value="Nord">
                                                    <label class="form-check-label" for="edit_region2_nord">Nord</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="edit_region2_sud" name="region2" value="Sud">
                                                    <label class="form-check-label" for="edit_region2_sud">Sud</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="edit_region2_est" name="region2" value="Est">
                                                    <label class="form-check-label" for="edit_region2_est">Est</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="edit_region2_ouest" name="region2" value="Ouest">
                                                    <label class="form-check-label" for="edit_region2_ouest">Ouest</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_itinerary">Itinéraire (km) :</label>
                                                <input type="text" class="form-control" id="edit_itinerary" name="itinerary" placeholder="Entrer la distance de l'itinéraire en km" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_duration" class="form-label">Durée de Séjour :</label>
                                                <select class="form-control" id="edit_duration" name="duration" required>
                                                    <option selected disabled value="">Séléctionnez la durée de Séjour</option>
                                                    <option value="7Jours /6Nuits">7Jours /6Nuits</option>
                                                    <option value="14Jours /13Nuits">14Jours /13Nuits</option>
                                                    <option value="21Jours /20Nuits">21Jours /20Nuits</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="edit_description_voyage">Description de voyage :</label>
                                        <textarea class="form-control" id="edit_description_voyage" name="description_voyage" rows="4" placeholder="Entrer la description pour ce voyage" required></textarea>
                                    </div>
                                    <input type="hidden" id="edit_voyage_id" name="id">
                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Pour la requête GET
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                const voyageId = this.getAttribute('data-voyage-id');
                console.log('Fetching data for voyage ID:', voyageId);
                fetch(`/endemika/admin/getVoyage/${voyageId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(voyage => {
                        console.log('Voyage data:', voyage);
                        document.getElementById('edit_product_title').value = voyage.product_title || '';
                        document.getElementById('edit_id_produit').value = voyage.id_produit || '';
                        document.getElementById('edit_prix').value = voyage.prix || 0;
                        document.getElementById('edit_etapes_voyage').value = voyage.etapes_voyage || '';
                        document.getElementById('edit_category').value = voyage.category || '';
                        document.getElementById('edit_saison').value = voyage.saison || '';
                        document.getElementById('edit_transport').value = voyage.transport || '';

                        // Réinitialisation des checkboxes radio
                        document.querySelectorAll('input[name="region1"]').forEach(input => input.checked = false);
                        document.querySelectorAll('input[name="region2"]').forEach(input => input.checked = false);

                        // Attribution des valeurs
                        if (voyage.region1) {
                            document.querySelector(`#edit_region1_${voyage.region1.toLowerCase()}`).checked = true;
                        }
                        if (voyage.region2) {
                            document.querySelector(`#edit_region2_${voyage.region2.toLowerCase()}`).checked = true;
                        }

                        document.getElementById('edit_itinerary').value = voyage.itinerary || '';
                        document.getElementById('edit_duration').value = voyage.duration || '';
                        document.getElementById('edit_description_voyage').value = voyage.description_voyage || '';
                        document.getElementById('edit_voyage_id').value = voyage.id;
                        $('#editVoyageModal').modal('show');
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

        // Pour la requête POST
        document.getElementById('editVoyageForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            const formData = new FormData(this);
            const voyageId = document.getElementById('edit_voyage_id').value;

            fetch(`/endemika/admin/handleEditVoyages/${voyageId}`, {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.text(); // Utiliser text() pour inspecter la réponse brute
                })
                .then(text => {
                    console.log('Response text:', text); // Log pour vérifier la réponse
                    if (!text) {
                        throw new Error('Response was empty');
                    }
                    return JSON.parse(text); // Convertir manuellement le texte en JSON
                })
                .then(data => {
                    if (data.success) {
                        window.location.href = '<?= URL ?>admin/listingVoyages';
                    } else {
                        console.error('Failed to update voyage:', data.message);
                        alert('Failed to update voyage: ' + data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>

</body>

</html>
