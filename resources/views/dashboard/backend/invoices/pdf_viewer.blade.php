@extends('dashboard.layouts.master')

@section('title')
 Invoices
@endsection


@section('content')

<embed src="{{ $pdf_path }}" type="application/pdf" width="100%" height="600px">


@endsection
