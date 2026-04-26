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
        <h1>Editar infracción</h1>
        </div><!-- Final page title -->

        {{-- Inicio de formulario de edición de  "infracciones" --}}
        <section class="section">
            <div class="row">
                <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datos del ciudadano</h5>
                        <form class="row g-3" action="{{ route('infracciones.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres" value="{{ $item->nombres }}" required>
                                    <label for="nombres">Nombres</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" value="{{ $item->apellidos }}" required>
                                    <label for="apellidos">Apellidos</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" value="{{ $item->direccion }}" required>
                                    <label for="direccion">Dirección</label>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="cedula" id="cedula" placeholder="Cédula de identidad" value="{{ $item->cedula }}" required oninput="if(this.value.length>8)this.value=this.value.slice(0,8)">
                                    <label for="cedula">Cédula de identidad</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="numero" id="numero" placeholder="Número de teléfono" value="{{ $item->numero }}" required oninput="if(this.value.length>11)this.value=this.value.slice(0,11)">
                                    <label for="numero">Número de teléfono</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="placa_vehiculo" id="placa_vehiculo" placeholder="Placa del vehículo" value="{{ $item->placa_vehiculo }}" maxlength="9" required>
                                    <label for="placa_vehiculo">Placa del vehículo</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" name="tipo_infraccion" id="tipo_infraccion" required>
                                        <option>Seleccione una opción</option>
                                        <option value="Documentación vencida o inexistente" {{ $item->tipo_infraccion == 'Documentación vencida o inexistente' ? 'selected' : '' }}>Documentación vencida o inexistente</option>
                                        <option value="Conducir bajo los efectos del alcohol o estupefacientes" {{ $item->tipo_infraccion == 'Conducir bajo los efectos del alcohol o estupefacientes' ? 'selected' : '' }}>Conducir bajo los efectos del alcohol o estupefacientes</option>
                                        <option value="Exceso de velocidad" {{ $item->tipo_infraccion == 'Exceso de velocidad' ? 'selected' : '' }}>Exceso de velocidad</option>
                                        <option value="No respetar señales de tránsito" {{ $item->tipo_infraccion == 'No respetar señales de tránsito' ? 'selected' : '' }}>No respetar señales de tránsito</option>
                                        <option value="Uso indebido del teléfono móvil" {{ $item->tipo_infraccion == 'Uso indebido del teléfono móvil' ? 'selected' : '' }}>Uso indebido del teléfono móvil</option>
                                        <option value="No usar cinturón de seguridad" {{ $item->tipo_infraccion == 'No usar cinturón de seguridad' ? 'selected' : '' }}>No usar cinturón de seguridad</option>
                                        <option value="Maniobras prohibidas" {{ $item->tipo_infraccion == 'Maniobras prohibidas' ? 'selected' : '' }}>Maniobras prohibidas</option>
                                </select>
                                    <label for="tipo_infraccion">Tipo de infracción</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" name="estado" id="estado" required>
                                        <option value="Retenido" {{ $item->estado == 'Retenido' ? 'selected' : '' }}>Retenido</option>
                                        <option value="Liberado" {{ $item->estado == 'Liberado' ? 'selected' : '' }}>Liberado</option>
                                        <option value="En fiscalía" {{ $item->estado == 'En fiscalía' ? 'selected' : '' }}>En fiscalía</option>
                                </select>
                                    <label for="estado">Estado</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-2" for="bitacora">Bitácora</label>
                                <textarea name="bitacora" id="bitacora" class="form-control" rows="4">{{ $item->bitacora }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <h5 class="card-title">Documentación que posee</h5>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <input hidden name="documentos[docSeguro]" value="0">
                                        <input class="form-check-input me-1" type="checkbox" name="documentos[docSeguro]" value="1" id="docSeguro" {{ !empty($item->documentos['docSeguro']) && $item->documentos['docSeguro'] ? 'checked' : '' }}>
                                        Seguro médico
                                    </li>
                                    <li class="list-group-item">
                                        <input hidden name="documentos[docCerMed]" value="0">
                                        <input class="form-check-input" type="checkbox" name="documentos[docCerMed]" value="1" id="docCerMed" {{ !empty($item->documentos['docCerMed']) && $item->documentos['docCerMed'] ? 'checked' : '' }}>
                                        Certificado médico
                                    </li>
                                    <li class="list-group-item">
                                        <input hidden name="documentos[docRCV]" value="0">
                                        <input class="form-check-input" type="checkbox" name="documentos[docRCV]" value="1" id="docRCV" {{ !empty($item->documentos['docRCV']) && $item->documentos['docRCV'] ? 'checked' : '' }}>
                                        Responsabilidad civil del vehículo
                                    </li>
                                    <li class="list-group-item">
                                        <input hidden name="documentos[docCerOri]" value="0">
                                        <input class="form-check-input" type="checkbox" name="documentos[docCerOri]" value="1" id="docCerOri" {{ !empty($item->documentos['docCerOri']) && $item->documentos['docCerOri'] ? 'checked' : '' }}>
                                        Certificado de origen
                                    </li>
                                    <li class="list-group-item">
                                        <input hidden name="documentos[docTitProp]" value="0">
                                        <input class="form-check-input" type="checkbox" name="documentos[docTitProp]" value="1" id="docTitProp" {{ !empty($item->documentos['docTitProp']) && $item->documentos['docTitProp'] ? 'checked' : '' }}>
                                        Título de propiedad
                                    </li>
                                    <li class="list-group-item">
                                        <input hidden name="documentos[docCarneCir]" value="0">
                                        <input class="form-check-input" type="checkbox" name="documentos[docCarneCir]" value="1" id="docCarneCir" {{ !empty($item->documentos['docCarneCir']) && $item->documentos['docCarneCir'] ? 'checked' : '' }}>
                                        Carnet de circulación
                                    </li>
                                    <li class="list-group-item">
                                        <input hidden name="documentos[docLicencia]" value="0">
                                        <input class="form-check-input" type="checkbox" name="documentos[docLicencia]" value="1" id="docLicencia" {{ !empty($item->documentos['docLicencia']) && $item->documentos['docLicencia'] ? 'checked' : '' }}>
                                        Licencia de conducir
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            
                            <div class="col-6">
                                <button style="pointer-events: none;" type="submit" class="btn btn-success mt-3"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                                <a href="{{ route('infracciones.index') }}" class="btn btn-secondary mt-3"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
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