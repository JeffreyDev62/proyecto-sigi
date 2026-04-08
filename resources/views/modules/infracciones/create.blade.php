@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')

<main id="main" class="main">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="pagetitle">
        <h1>Registrar nueva infracción</h1>
        </div><!-- Final page title -->

        {{-- Inicio de formulario "infracciones" --}}
        <section class="section">
            <div class="row">
                <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datos del ciudadano</h5>
                        <form class="row g-3" action="{{ route('infracciones.store') }}" method="POST">
                            @csrf
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres" required>
                                    <label for="nombres">Nombres</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" required>
                                    <label for="apellidos">Apellidos</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" required>
                                    <label for="direccion">Dirección</label>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="cedula" id="cedula" placeholder="Cédula de identidad" required oninput="if(this.value.length>8)this.value=this.value.slice(0,8)">
                                    <label for="cedula">Cédula de identidad</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="numero" id="numero" placeholder="Número de teléfono" required oninput="if(this.value.length>11)this.value=this.value.slice(0,11)">
                                    <label for="numero">Número de teléfono</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="placa_vehiculo" id="placa_vehiculo" placeholder="Placa del vehículo" maxlength="9" required>
                                    <label for="placa_vehiculo">Placa del vehículo</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" name="tipo_infraccion" id="tipo_infraccion" required>
                                    <option selected>Seleccione una opción</option>
                                    <option value="Documentación vencida o inexistente">Documentación vencida o inexistente</option>
                                    <option value="Conducir bajo los efectos del alcohol o estupefacientes">Conducir bajo los efectos del alcohol o estupefacientes</option>
                                    <option value="Exceso de velocidad">Exceso de velocidad</option>
                                    <option value="No respetar señales de tránsito">No respetar señales de tránsito</option>
                                    <option value="Uso indebido del teléfono móvil">Uso indebido del teléfono móvil</option>
                                    <option value="No usar cinturón de seguridad">No usar cinturón de seguridad</option>
                                    <option value="Maniobras prohibidas">Maniobras prohibidas</option>
                                </select>
                                    <label for="tipo_infraccion">Tipo de infracción</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-2" for="bitacora">Bitácora</label>
                                <textarea name="bitacora" id="bitacora" class="form-control" rows="4"></textarea>
                            </div>

                            <div class="col-md-12">
                                <h5 class="card-title">Documentación que posee</h5>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <input hidden name="documentos[docSeguro]" value="0">
                                        <input class="form-check-input me-1" type="checkbox" name="documentos[docSeguro]" value="1" id="docSeguro">
                                        Seguro médico
                                        
                                    </li>
                                    <li class="list-group-item">
                                        <input hidden name="documentos[docCerMed]" value="0">
                                        <input class="form-check-input" type="checkbox" name="documentos[docCerMed]" value="1" id="docCerMed">
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
                                        <input class="form-check-input" type="checkbox" name="documentos[docLicencia]" value="1" id="docLicencia">
                                        Licencia de conducir
                                        
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary mt-3"><i class=" ri-save-2-fill"></i> Guardar</button>
                                <a href="{{ route('infracciones.index') }}" class="btn btn-secondary mt-3"><i class=" ri-arrow-go-back-fill"></i> Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <img src="{{ asset('recursos/assets/img/cr6.jpeg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Recuerde...</h5>
                        <p class="card-text">Al registrar una infracción, asegúrese de ingresar la información correcta y completa del infractor, así como los detalles precisos de la infracción cometida.</p>
                        </div>
                    </div>
                    {{-- <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Recuerde</h5>
                            <p class="card-text">Al registrar una infracción, asegúrese de ingresar la información correcta y completa del infractor, así como los detalles precisos de la infracción cometida. Esto garantizará un proceso eficiente y justo para todas las partes involucradas.</p>
                        </div>
                    </div> --}}
                </div>
            </div>
            
            
        </section>
    </main>

@endsection