@extends('layouts.master')

@section('content')
    <iframe src="{{ $user->userProvKabKota->file_permohonan }}" width="100%" height="500px"></iframe>
@endsection
