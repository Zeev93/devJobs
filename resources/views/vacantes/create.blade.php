@extends ('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('navegacion')
   @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Nueva Vacante</h1>

    <form action="{{ route('vacantes.store') }}" class="max-w-lg mx-auto my-10" method="POST">
        @csrf
        <div class="mb-5">
            <label
                for="titulo"
                class="block text-gray-700 text-sm mb-2"
            >Titulo Vacante</label>
            <input
                id="titulo"
                type="text"
                class="p-3 bg-white-200 rounded form-input w-full @error('titulo') border-red-500 @enderror"
                name="titulo"
                autocomplete="current-titulo"
                placeholder="Titulo de la vacante"
                value="{{old('titulo')}}"
            >
            @error('titulo')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-3 mb-6 relative" role="alert">
                    <strong class="font-bold"> Error! </strong>
                    <span class="block"> {{$message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="categoria"
                class="block text-gray-700 text-sm mb-2"
            >Categoría: </label>
            <select
                id="categoria"
                class="block appearence-none w-full boder border-gray-200 text-gray-700
                        rounded leading-tight focus:outline-none focus:bg-white
                        focus:border-gray-500 p-3 bg-gray-100"
                name="categoria"
            >
                <option value="">-- Selecciona --</option>
                @foreach( $categorias as $categoria)
                    <option
                    {{ old('categoria') == $categoria->id ? 'selected' : '' }}
                    value="{{ $categoria->id }}"> {{ $categoria->nombre }}</option>
                @endforeach
            </select>
            @error('categoria')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-3 mb-6 relative" role="alert">
                    <strong class="font-bold"> Error! </strong>
                    <span class="block"> {{$message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="experiencia"
                class="block text-gray-700 text-sm mb-2"
            >Experiencia: </label>
            <select
                id="experiencia"
                class="block appearence-none w-full boder border-gray-200 text-gray-700
                        rounded leading-tight focus:outline-none focus:bg-white
                        focus:border-gray-500 p-3 bg-gray-100"
                name="experiencia"
            >
                <option value="">-- Selecciona --</option>
                @foreach( $experiencias as $experiencia)
                    <option
                        {{ old('experiencia') == $experiencia->id ? 'selected' : '' }}
                        value="{{ $experiencia->id }}"> {{ $experiencia->nombre }}</option>
                @endforeach
            </select>
            @error('experiencia')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-3 mb-6 relative" role="alert">
                <strong class="font-bold"> Error! </strong>
                <span class="block"> {{$message }}</span>
            </div>
        @enderror
        </div>
        <div class="mb-5">
            <label
                for="ubicacion"
                class="block text-gray-700 text-sm mb-2"
            >Ubicaciones: </label>
            <select
                id="ubicacion"
                class="block appearence-none w-full boder border-gray-200 text-gray-700
                        rounded leading-tight focus:outline-none focus:bg-white
                        focus:border-gray-500 p-3 bg-gray-100"
                name="ubicacion"
            >
                <option value="">-- Selecciona --</option>
                @foreach( $ubicaciones as $ubicacion)
                    <option
                        {{ old('ubicacion') == $ubicacion->id ? 'selected' : '' }}
                        value="{{ $ubicacion->id }}"> {{ $ubicacion->nombre }}</option>
                @endforeach
            </select>
            @error('ubicacion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-3 mb-6 relative" role="alert">
                    <strong class="font-bold"> Error! </strong>
                    <span class="block"> {{$message }}</span>
                </div>
            @enderror
        </div>
        <div class="mb-5">
            <label
                for="salario"
                class="block text-gray-700 text-sm mb-2"
            >Salarios: </label>
            <select
                id="salario"
                class="block appearence-none w-full boder border-gray-200 text-gray-700
                        rounded leading-tight focus:outline-none focus:bg-white
                        focus:border-gray-500 p-3 bg-gray-100"
                name="salario"
            >
                <option value="">-- Selecciona --</option>
                @foreach( $salarios as $salario)
                    <option
                        {{ old('salario') == $salario->id ? 'selected' : '' }}
                        value="{{ $salario->id }}"> {{ $salario->nombre }}</option>
                @endforeach
            </select>
            @error('salario')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-3 mb-6 relative" role="alert">
                <strong class="font-bold"> Error! </strong>
                <span class="block"> {{$message }}</span>
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="descripcion"
                class="block text-gray-700 text-sm mb-2"
            >Descripción del puesto: </label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>
            <input type="hidden" name="descripcion" id="descripcion" value={{ old('descripcion') }}>
            @error('descripcion')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-3 mb-6 relative" role="alert">
                <strong class="font-bold"> Error! </strong>
                <span class="block"> {{$message }}</span>
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="dropzoneDevJobs"
                class="block text-gray-700 text-sm mb-2"
            >Imagen vacante: </label>
            <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100"></div>
            <input type="hidden" name="imagen" id="imagen" value={{old('imagen')}}>
            <p id="img-message"></p>
            @error('imagen')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-3 mb-6 relative" role="alert">
                <strong class="font-bold"> Error! </strong>
                <span class="block"> {{$message }}</span>
            </div>
            @enderror
        </div>


        <div class="mb-5">
            <label
                for="skills"
                class="block text-gray-700 text-sm mb-2"
            >Habilidades y Conocimientos <span class="text-xs text-gray-500">(Elije al menos 3)</span> </label>
            @php
                $skills = ["HTML", 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
            @endphp
            <lista-skills
                :skills="{{ json_encode($skills)}}"
                :oldskills="{{ json_encode( old('skills') ) }}"
            ></lista-skills>
            @error('skills')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-3 mb-6 relative" role="alert">
                <strong class="font-bold"> Error! </strong>
                <span class="block"> {{$message }}</span>
            </div>
            @enderror
        </div>

        <button
            type="submit"
            class="bg-green-500 w-full hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold"
        >
            Publicar Vacante
        </button>
    </form>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        Dropzone.autoDiscover= false;
        document.addEventListener('DOMContentLoaded', () => {
            // Medium Editor
            const editor = new MediumEditor('.editable', {
                toolbar: {
                    buttons: [
                        'bold', 'italic',
                        'underline', 'quote',
                        'anchor', 'justifyLeft',
                        'justifyCenter', 'justifyRight',
                        'justifyFull', 'orderedlist',
                        'unorderedlist', 'h2', 'h3'
                    ],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text: 'Información de la vacante'
                }
            });

            // Agrega al input hidden lo que el usuario escribe
            editor.subscribe('editableInput', function(eventObj, editable){
                const contenido = editor.getContent()
                document.querySelector('#descripcion').value = contenido
            })

            // Lenar el editor con el contenido del input hidden
            editor.setContent(document.querySelector('#descripcion').value)


            // Dropzone
            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: "/vacantes/imagen",
                dictDefaultMessage: 'Sube aquí tu archivo.',
                acceptedFiles: "/png,.jpg,.jpeg,.gif,.bmp,.webp",
                addRemoveLinks: true,
                dictRemoveFile: "Borrar archivo",
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                init: function() {
                    if(document.querySelector('#imagen').value.trim()){
                      let imagenPublicada = {}
                      imagenPublicada.size = 1234;
                      imagenPublicada.name = document.querySelector('#imagen').value;

                      this.options.addedfile.call(this, imagenPublicada);
                      this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);

                      imagenPublicada.previewElement.classList.add('dz-success');
                      imagenPublicada.previewElement.classList.add('dz-complete');
                    }
                },
                success: function(file, response){
                    document.querySelector("#imagen").textContent = response.success;

                    //coloca la respuesta del servidor en el input hidden

                    document.querySelector('#imagen').value = response.success;

                    //Añadir al objeto de archivo el nombre del servidor

                    file.nombreServidor = response.success
                },
                error: function(file, response){
                    document.querySelector("#img-message").textContent = "Formato no valido";
                },
                maxfilesexceeded: function(file){
                    if ( this.files[1] != null ){
                        this.removeFile(this.files[0]) // Eliminar archivo anterior
                        this.addFile(file) // Agregar el nuevo archivo
                    }
                },
                removedfile: function (file, response){
                    file.previewElement.parentNode.removeChild(file.previewElement)

                    params = {
                        imagen: file.nombreServidor ?? document.querySelector('#imagen').value
                    }

                    axios.post('/vacantes/borrarimagen', params)
                        .then( response => console.log(response))
                }
            })


        })
    </script>
@endsection
