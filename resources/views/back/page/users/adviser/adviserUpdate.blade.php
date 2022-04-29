@extends('back.layouts.master')
@section('title', 'Müşavir Güncelleme Sayfası')
@section('headingTitle','Müşavir Güncelleme Sayfası')
@section('css')
@section('content')
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        <li>{{$err}}</li>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{route('back.users.adviserUpdate',$userInformation->id)}}" method="post"
                                  enctype="multipart/form-data" class="form-horizontal">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="opacity-75" style="color:rgb(96, 112, 128)">Müşavir Bilgileri</h5>
                                        <div class="form-group">
                                            <div class="row pt-5">
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <img
                                                            src="@if($userInformation->profile_photo_path !=null) {{$userInformation->profile_photo_path}} @else{{ $userInformation->profile_photo_url }}@endif"
                                                            alt=""
                                                            class="img-fluid img-profile img-circle img-responsive avatar-md rounded-circle"
                                                            style="width:auto!important;">
                                                    </div>
                                                </div>
                                                <div class="float-right col-md-1 pr-1 pl-1" style="border-right:1px solid black;opacity:0.2;width: auto!important;">
                                                </div>
                                                <div class="col-md-10 pl-4 pt-md-3">
                                                    <div class="form-group col-12">
                                                        <input id="image" name="image" type="file" class="form-control">
                                                        <small> Yan tarafta yüklemiş olduğunuz resim gözükmektedir.Resmi
                                                            değiştirmek için Dosya Seç'e tıklayınız.</small><br>
                                                    </div>
                                                    <div class="form-group col-md-6 float-start">
                                                        <label>E-Mail Adresi</label>
                                                        <input type="text" name="email" class="form-control" value="{{$userInformation->email}}"><br>
                                                    </div>
                                                    <div class="form-group col-md-6 float-end">
                                                        <label>Şifre</label>
                                                        <input type="password" name="password" class="form-control" value=""><br>
                                                    </div>
                                                    <div class="form-group col-md-6 float-start">
                                                        <label>Müşavirin Adı-Soyadı</label>
                                                        <input type="text" name="name" class="form-control" value="{{$userInformation->name}}"><br>
                                                    </div>
                                                    <div class="form-group col-md-6 float-end">
                                                        <label>Müşavirin Adresi</label>
                                                        <input type="text" name="company_address" class="form-control" value="{{$userInformation->company_address}}"><br>
                                                    </div>
                                                    <div class="form-group col-6 float-start">
                                                        <label>Müşavirin Ülkesi</label>
                                                        <select name="country" id="country" onchange="getCities(this)" class="form-select">
                                                            <option  value="country" selected>Ülke</option>
                                                            @foreach($country as $ct)
                                                                <option value="{{$ct->id}}"{{$ct->id==$userInformation->country?'selected':''}} >{{$ct->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <br>
                                                    </div>  <br>
                                                    <div class="form-group col-6 float-end">
                                                        <label>Müşavirin Şehri</label>
                                                        <select name="city" id="city"  class="form-select">
                                                            <option value="{{$userInformation->city}}" selected>{{$userInformation->city}}</option>
                                                        </select>
                                                        <br>
                                                    </div>
                                                    <div class="form-group col-md-6 float-start">
                                                        <label>Müşavirin Telefonu</label>
                                                        <input type="text" name="company_phone" id="company_phone" class="form-control" value="{{$userInformation->company_phone}}"><br>
                                                    </div>
                                                    <div class="form-group col-md-6 float-end">
                                                        <label>Müşavirin Faxı</label>
                                                        <input type="text" name="company_fax" id="company_fax" class="form-control" value="{{$userInformation->company_fax}}"><br>
                                                    </div>
                                                    <div class="form-group input-group col-12 float-start" style="margin-top: 1em;">
                                                        <label class="input-group-text" for="roles">Yetki:</label>
                                                        <select name="role" class="form-select" id="roles">
                                                            <option  value="user" @if($userInformation->role=='user')selected @endif>Kullanıcı</option>
                                                            <option value="employee" @if($userInformation->role=='employee')selected @endif>Personel</option>
                                                            <option value="admin" @if($userInformation->role=='admin')selected @endif>Admin</option>
                                                            <option value="adviser" @if($userInformation->role=='adviser')selected @endif>Müşavir</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-primary me-3 mb-1">Kaydet</button>
                                        <a href="{{route('back.users.adviser')}}" type="reset"
                                           class="btn btn-light-secondary me-1 mb-1" style="color: rgb(96, 112, 128)"> Geri Dön</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
    <script>
        $(window).load(function()
        {
            var phones = [{ "mask": "(###) ###-##-##"}];
            $('#company_phone').inputmask({
                mask: phones,
                greedy: false,
                definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
        });
        $(window).load(function()
        {
            var phones = [{ "mask": "(###) ###-##-##"}];
            $('#company_fax').inputmask({
                mask: phones,
                greedy: false,
                definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
        });

        function getCities(e){
            let country = e.value
            $.ajax({
                url:'{{route('back.getCity')}}',
                type:'GET',
                data : {
                    country: country,
                },
                success:(response)=>{
                    let element = document.getElementById('city');
                    element.innerHTML = '';
                    for(let i = 0 ; i < response.length ; i++){
                        element.innerHTML += '<option value="'+response[i].name+'">'+response[i].name+'</option>';
                    }
                }
            })
        }
    </script>
@endsection
