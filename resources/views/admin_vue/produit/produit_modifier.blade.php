@extends('admin_vue.parent_admin')
@section('tittle', 'profile admin')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h1 class="col-lg-6 col-md-8 col-10 mx-auto mb-3" style="text-decoration: underline;">add products</h1>
            <form  class="col-lg-6 col-md-8 col-10 mx-auto" id="submit" action="{{ route('Modify_produit_trait')  }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>

                 @endif
                 <input type="hidden" id="id" name="id" class="form-control" value="{{$produit->id}}">
                <div class="form-group mb-3">
                    <label for="nomproduit">Product name</label>
                    <input type="text" id="nomproduit" name="modnomproduit" class="form-control" value="{{$produit->name_produit}}">
                    <small class="text-danger fw-bold" id="error-nomproduit"></small>
                </div>

                <div class="form-group mb-3">
                    <label for="descriptionproduits">Product description</label>
                    <textarea id="descriptionproduits" name="moddescriptionproduits" rows="4" cols="50" class="form-control">{{$produit->description}}</textarea>
                    <small class="text-danger fw-bold" id="error-descriptionproduits"></small>
                </div>
                <div class="form-group mb-3">
                    <label for="nomproduit">Product price</label>
                    <input type="text" id="prixproduit" name="modprixproduit" class="form-control" value="{{$produit->prix}}">
                    <small class="text-danger fw-bold" id="error-prixproduit"></small>
                </div>
                <div class="form-group mb-3">
                    <label for="imageprincipalproduit">choose a main image :</label>
                    <input type="file" id="imageprincipalproduit" name="modimageprincipalproduit" class="form-control">
                    <small class="text-danger fw-bold" id="error-imageprincipalproduit"></small>
                    <div id="previewimageprin" class="mt-2"></div>
                </div>
                <div id="formContainer"></div>
                <button type="button" onclick="addImageForm()" class="mt-3 btn btn-primary">+</button>
                <div class="form-group mt-3">
                    <label for="choisirecategorie">choose the category</label>
                    <select name="modcategorie_id" id="choisirecategorie" class="form-control">
                        @if ($selectedcategorie)
                            <option value="{{ $selectedcategorie->id }}">{{ $selectedcategorie->name_category }}</option>
                        @endif
                        @foreach($othercategories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->name_category }}</option>
                        @endforeach
                    </select>
                    <small class="text-danger fw-bold" id="error-modcategorie_id"></small>
                </div>
                <div class="form-group mt-3">
                    <label for="choisirgenre">Choose the genre</label>
                    <select name="modgenre_id" id="choisirgenre" class="form-control">
                        @if ($selectedGenre)
                            <option value="{{ $selectedGenre->id }}">{{ $selectedGenre->name_genre }}</option>
                        @endif
                        @foreach($otherGenres  as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name_genre }}</option>
                        @endforeach
                    </select>
                    <small class="text-danger fw-bold" id="error-modgenre_id"></small>
                </div>

                <button class="mt-3 btn btn-lg btn-primary btn-block" type="submit" id="modifproduit">send</button>
            </form>

    <script>
        document.getElementById('imageprincipalproduit').addEventListener('change', function (e) {
            var preview = document.getElementById('previewimageprin');
            preview.innerHTML = ''; // Efface tout contenu précédent

            var file = e.target.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '200px';
                    img.style.height = '200px';
                    img.alt = 'Aperçu de l\'image';
                    preview.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        });

        var formCount = 0;

        function addImageForm() {
            if (formCount >= 4) {
                alert('The maximum number of photos is 5');
                return;
            }

            var formContainer = document.getElementById('formContainer');
            var newForm = document.createElement('div');
            newForm.classList.add('form-group');

            var label = document.createElement('label');
            label.textContent = 'Choose a picture:';
            newForm.appendChild(label);

            var newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.name = 'modimageproduit' + (formCount + 1);
            newInput.accept = 'image/*';
            newInput.id = 'modimageproduit' + (formCount + 1);
            newInput.classList.add('file-input', 'form-control');
            newForm.appendChild(newInput);

            var errorSmall = document.createElement('small');
            errorSmall.classList.add('text-danger', 'fw-bold');
            errorSmall.id = 'error-imageproduit' + (formCount + 1);
            newForm.appendChild(errorSmall);

            var divImage = document.createElement('div');
            divImage.classList.add('mt-2', 'fw-bold', 'image-preview');
            divImage.id = 'previewimage' + (formCount + 1);
            newForm.appendChild(divImage);

            formContainer.appendChild(newForm);

            newInput.addEventListener('change', function (e) {
                previewImage(e, newInput, divImage);
            });

            formCount++;
        }

        function previewImage(e, fileInput, previewContainer) {
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Image Preview';
                    img.style.width = '200px';
                    img.style.height = '200px';
                    previewContainer.innerHTML = ''; // Clear previous content
                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        }

    </script>
        </div> <!-- /.col -->
    </div>
</div>
<script src="assets/js/categorie.js"></script>
@endsection
