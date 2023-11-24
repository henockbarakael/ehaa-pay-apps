@extends('layouts.master')
@section('content')
{!! Toastr::message() !!}
<div class="row mb-4">
  <div class="col-12 px-0">
      <ul class="list-group list-group-flush bg-none">

          @foreach($data as $transaction)
          <li class="list-group-item">
              <div class="row">
                  <div class="col-auto">
                      <p class="text-muted size-12">{{ $transaction->created_at }}</p>
                  </div>
                  {{-- <div class="col align-self-center ps-0">
                      <p class="text-muted size-12">{{ $transaction->account_code }}</p>
                  </div> --}}
                  <div class="col align-self-center text-center">
                      <p class="text-muted size-12">{{ $transaction->amount.' '.$transaction->currency }}</p>
                  </div>
                  {{-- <div class="col align-self-center ps-0">
                      <p class="text-muted size-12">{{ $transaction->currency }}</p>
                  </div> --}}
                  {{-- <div class="col align-self-center text-end">
                      <p class="text-muted size-12">{{ $transaction->reference }}</p>
                  </div> --}}
                  <div class="col-auto align-self-center text-end">
                      <p class="text-muted size-12">{{ $transaction->transaction_type }}</p>
                  </div>
                  {{-- <div class="col-auto align-self-center">
                      <a href="transaction-detail.html"><i class="bi bi-arrow-right"></i></a>
                  </div> --}}
              </div>
          </li>
          @endforeach
      </ul>
  </div>

</div>

<div class="col-auto">
  <div class="col-12" >
      <nav>
          <ul class="pagination justify-content-center">
        <!-- Bouton précédent -->
        @if ($data->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">&laquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $data->previousPageUrl() }}" rel="prev">&laquo;</a>
            </li>
        @endif

        <!-- Liens de pagination -->
        @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
            @if ($page == $data->currentPage())
                <li class="page-item active">
                    <span class="page-link">{{ $page }}</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endif
        @endforeach

        <!-- Bouton suivant -->
        @if ($data->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $data->nextPageUrl() }}" rel="next">&raquo;</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">&raquo;</span>
            </li>
        @endif
    </ul>
      </nav>
  </div>
</div>
@endsection