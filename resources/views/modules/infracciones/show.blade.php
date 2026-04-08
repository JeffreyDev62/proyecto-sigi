@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')

<main id="main" class="main">
        <div class="pagetitle">
        <h1>Confirmar eliminación</h1>
        </div><!-- Final page title -->

        {{-- Mostrar datos de infracción antes de eliminar --}}
        <section class="section">
            <div class="row">
                <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">¿Desea eliminar este registro?</h5>
                        <form class="row g-3" action="{{ route('infracciones.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres" value="{{ $item->nombres }}" readonly>
                                    <label for="nombres">Nombres</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" value="{{ $item->apellidos }}" readonly>
                                    <label for="apellidos">Apellidos</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" value="{{ $item->direccion }}" readonly>
                                    <label for="direccion">Dirección</label>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="cedula" id="cedula" placeholder="Cédula de identidad" value="{{ $item->cedula }}" readonly oninput="if(this.value.length>8)this.value=this.value.slice(0,8)">
                                    <label for="cedula">Cédula de identidad</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="numero" id="numero" placeholder="Número de teléfono" value="{{ $item->numero }}" readonly oninput="if(this.value.length>11)this.value=this.value.slice(0,11)">
                                    <label for="numero">Número de teléfono</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="placa_vehiculo" id="placa_vehiculo" placeholder="Placa del vehículo" value="{{ $item->placa_vehiculo }}" readonly>
                                    <label for="placa_vehiculo">Placa del vehículo</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select style="pointer-events: none;" class="form-select" name="tipo_infraccion" id="tipo_infraccion" readonly>
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
                                    <select style="pointer-events: none;" class="form-select" name="estado" id="estado">
                                        <option value="Retenido" {{ $item->estado == 'Retenido' ? 'selected' : '' }}>Retenido</option>
                                        <option value="Liberado" {{ $item->estado == 'Liberado' ? 'selected' : '' }}>Liberado</option>
                                        <option value="En fiscalía" {{ $item->estado == 'En fiscalía' ? 'selected' : '' }}>En fiscalía</option>
                                </select>
                                    <label for="estado">Estado</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-2" for="bitacora">Bitácora</label>
                                <textarea name="bitacora" id="bitacora" class="form-control" rows="4" readonly>{{ $item->bitacora }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <h5 class="card-title">Documentación que posee</h5>
                                <ul style="pointer-events: none;" class="list-group">
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
                                <button type="submit" class="btn btn-danger mt-3"><i class="ri-delete-bin-5-fill"></i> Eliminar</button>
                                <a href="{{ route('infracciones.index') }}" class="btn btn-secondary mt-3"><i class="ri-arrow-go-back-fill"></i> Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            
            
        </section>
    </main>

@endsection