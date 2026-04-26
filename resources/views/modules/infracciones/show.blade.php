@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')

<main id="main" class="main">
        <div class="pagetitle">
        <h1>Consultar</h1>
        </div><!-- Final page title -->

        {{-- Mostrar datos de infracción antes de eliminar --}}
        <section class="section">
            <div class="row">
                <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detalles de Infracción</h5>
                        <form class="row g-3" action="#" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <ul class="list-group">
                                    <li class="list-group-item"><i class="ri-user-fill me-1"></i> <a href="#">Infractor: Nombre Apellido</a></li>
                                    <li class="list-group-item"><i class="ri-car-fill me-1"></i> <a href="#">Vehículo: ABCDEFGHI</a></li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                    <div class="form-floating">
                                        <select disabled class="form-select" name="tipo_infraccion" id="tipo_infraccion" required>
                                            <option>Seleccione una opción</option>
                                            <option value="#">Infracción 1</option>
                                            <option selected value="#">Infracción 2</option>
                                            <option value="#">Infracción 3</option>
                                        </select>
                                        <label for="tipo_infraccion">Tipo de infracción</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <select disabled class="form-select" name="ubicacion" id="ubicacion" required>
                                            <option>Seleccione una opción</option>
                                            <option value="#">Ubicación 1</option>
                                            <option value="#">Ubicación 2</option>
                                            <option selected value="#">Ubicación 3</option>
                                        </select>
                                        <label for="ubicacion">Ubicación</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <select disabled class="form-select" name="oficial" id="oficial" required>
                                            <option>Seleccione una opción</option>
                                            <option selected value="#">Oficial 1</option>
                                            <option value="#">Oficial 2</option>
                                            <option value="#">Oficial 3</option>
                                        </select>
                                        <label for="oficial">Oficial</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="mb-2" for="observaciones">Observaciones</label>
                                    <textarea disabled name="observaciones" id="observaciones" class="form-control" rows="4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras blandit est turpis, id luctus lorem sodales sit amet. Donec pulvinar sodales dapibus. Vestibulum nisl eros, vestibulum quis nulla et, blandit fringilla ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed turpis ipsum, tincidunt non varius in, suscipit non arcu. Suspendisse potenti. Nunc tristique, dolor in porta malesuada, magna justo faucibus orci, non imperdiet tortor neque eget leo. Fusce sit amet mauris tortor. Pellentesque sit amet ipsum ut augue efficitur maximus non eget elit. Duis malesuada massa in scelerisque suscipit. Phasellus id lacinia ligula, vel posuere enim. Nulla fermentum efficitur neque, vel ullamcorper leo imperdiet vel. Aliquam risus metus, aliquet vel risus dapibus, ultrices placerat eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse vitae sem quis dui posuere maximus vitae sit amet enim. Ut dapibus velit at mi accumsan fermentum.</textarea>
                                </div>

                                <div class="col-md-12">
                                    <h5 class="card-title">Documentación del ciudadano</h5>
                                    <ul style="pointer-events: none;" class="list-group">
                                        <li class="list-group-item">
                                            <input hidden name="documentos[docSeguro]" value="0">
                                            <input class="form-check-input me-1" type="checkbox" name="documentos[docSeguro]" value="1" id="docSeguro">
                                            Seguro médico
                                            
                                        </li>
                                        <li class="list-group-item">
                                            <input hidden name="documentos[docCerMed]" value="0">
                                            <input class="form-check-input" type="checkbox" name="documentos[docCerMed]" value="1" id="docCerMed" checked>
                                            Certificado médico

                                        </li>
                                        <li class="list-group-item">
                                            <input hidden name="documentos[docRCV]" value="0">
                                            <input class="form-check-input" type="checkbox" name="documentos[docRCV]" value="1" id="docRCV">
                                            Responsabilidad civil del vehículo
                                            
                                        </li>
                                        <li class="list-group-item">
                                            <input hidden name="documentos[docCerOri]" value="0">
                                            <input class="form-check-input" type="checkbox" name="documentos[docCerOri]" value="1" id="docCerOri">
                                            Certificado de origen
                                            
                                        </li>
                                        <li class="list-group-item">
                                            <input hidden name="documentos[docTitProp]" value="0">
                                            <input class="form-check-input" type="checkbox" name="documentos[docTitProp]" value="1" id="docTitProp">
                                            Título de propiedad
                                            
                                        </li>
                                        <li class="list-group-item">
                                            <input hidden name="documentos[docCarneCir]" value="0">
                                            <input class="form-check-input" type="checkbox" name="documentos[docCarneCir]" value="1" id="docCarneCir">
                                            Carnet de circulación
                                            
                                        </li>
                                        <li class="list-group-item">
                                            <input hidden name="documentos[docLicencia]" value="0">
                                            <input class="form-check-input" type="checkbox" name="documentos[docLicencia]" value="1" id="docLicencia" checked>
                                            Licencia de conducir
                                            
                                        </li>
                                    </ul>
                                </div>

                                <div class="mb-3 mt-4 row">
                                    <label for="evidencias" class="form-label">Evidencias fotográficas</label>
                                    <div class="col-md-4" style="pointer-events: none;">
                                        <img src="{{ asset('recursos/assets/img/evidencia1.jpg') }}" class="img-thumbnail" alt="Evidencia 1">
                                    </div>
                                    <div class="col-md-4" style="pointer-events: none;">
                                        <img src="{{ asset('recursos/assets/img/evidencia2.jpg') }}" class="img-thumbnail" alt="Evidencia 2">
                                    </div>
                                    <div class="col-md-4" style="pointer-events: none;">
                                        <img src="{{ asset('recursos/assets/img/evidencia3.jpg') }}" class="img-thumbnail" alt="Evidencia 3">
                                    </div>
                                </div>
                            <hr>
                            
                            <div class="col-6">
                                <a href="{{ route('infracciones.index') }}" class="btn btn-secondary mt-3"><i class="ri-arrow-go-back-fill"></i> Atrás</a>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            
            
        </section>
    </main>

@endsection