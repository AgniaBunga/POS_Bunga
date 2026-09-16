@extends('layouts.app')

@section('title','POS')

@section('content')

@include('layouts.navbar')

<style>
body {
    background:
    radial-gradient(circle at top left,#fff0eb 0%,transparent 35%),
    radial-gradient(circle at bottom right,#f5ddd5 0%,transparent 35%),
    linear-gradient(135deg,#fff8f5,#fdf1ee);
}

/* TITLE */
.pos-title {
    color:#7a4f44;
    font-weight:800;
    font-size:38px;
}

.text-muted {
    color:#b08b85!important;
}

/* CARD */
.pos-card {
    border:none;
    border-radius:35px;
    overflow:hidden;
    background:white;
    box-shadow:
    15px 15px 35px rgba(180,120,120,.18),
    -10px -10px 20px white;
}

/* HEADER */
.pos-header {
    background:
    linear-gradient(
        135deg,
        #c79288,
        #e8beb8
    );
    color:white;
    font-weight:700;
    font-size:18px;
    padding:20px;
}

/* SEARCH */
.form-control {
    border-radius:20px;
    border:2px solid #f1ddd7;
    padding:12px;
}

/* PRODUCT */
.product-item {
    border:none;
    background:#fff8f5;
    border-radius:25px;
    padding:12px;
    box-shadow:
    5px 5px 15px rgba(180,120,120,.12);
    transition:.3s;
}

.product-item:hover {
    transform:translateY(-5px);
    background:#fce9e5;
}

.product-img {
    width:60px;
    height:60px;
    object-fit:cover;
    border-radius:20px;
    border:4px solid white;
    box-shadow:
    5px 5px 15px rgba(120,80,70,.2);
}

.price-text {
    color:#c06b5d;
    font-weight:700;
}

.btn-add {
    background:#c79288;
    color:white;
    border:none;
    border-radius:15px;
}

/* TABLE */
.table {
    border-collapse:separate;
    border-spacing:0 10px;
}

.table thead th {
    background:
    linear-gradient(
        135deg,
        #c79288,
        #e8beb8
    );
    color:white;
    border:none;
    padding:15px;
}

.table tbody tr {
    background:#fff8f5;
    box-shadow:
    5px 5px 15px rgba(180,120,120,.1);
}

.table td {
    padding:15px;
    border:none;
}

/* TOTAL */
.total-box {
    background:
    linear-gradient(
        135deg,
        #f8d7d0,
        #fff0eb
    );
    border-radius:25px;
    padding:20px;
    text-align:center;
}

.total-price {
    color:#c06b5d;
    font-size:28px;
    font-weight:800;
}

/* BUTTON */
.btn-checkout {
    background:
    linear-gradient(
        135deg,
        #c79288,
        #e8beb8
    );
    color:white;
    border:none;
    border-radius:20px;
    padding:12px;
    font-weight:700;
}

.btn-cancel {
    border-radius:20px;
}
</style>

@if ($errors->any())
<div class="alert alert-danger rounded-4">
    <strong>⚠️ Terjadi Kesalahan:</strong>
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if($sale->status === 'COMPLETED')
<div class="alert alert-success rounded-4">
    ☕ Transaksi sudah selesai dan tidak dapat diubah.
</div>
@endif

<div class="mb-4">
    <h2 class="pos-title">☕ Coffee Bloom POS</h2>
    <p class="text-muted">Kelola pesanan dan pembayaran pelanggan</p>
</div>

<div class="row">

    {{-- PRODUK --}}
    <div class="col-md-6 mb-4">
        <div class="card pos-card">
            <div class="pos-header">☕ Menu Coffee</div>

            <div class="card-body" style="max-height:70vh;overflow:auto">
                <form method="GET" action="{{ route('penjualan.create') }}" class="mb-4">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="🔍 Cari menu coffee..." onkeyup="this.form.submit()">
                </form>

                @foreach($products as $product)
                <form method="POST" action="{{ route('itempenjualan.store') }}" class="row mb-3 align-items-center">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="col-7">
                        <button class="btn product-item w-100 text-start" type="submit">
                            <div class="d-flex align-items-center gap-3">
                                {{-- FOTO PRODUK + FALLBACK --}}
                                <img src="{{ asset('storage/'.$product->foto) }}" 
                                     onerror="this.onerror=null;this.src='https://via.placeholder.com/60?text=Coffee';" 
                                     class="product-img" 
                                     alt="{{ $product->nama }}">
                                <div>
                                    <div class="fw-bold">{{ $product->nama }}</div>
                                    <small class="price-text">Rp {{ number_format($product->harga_jual,0,',','.') }}</small>
                                </div>
                            </div>
                        </button>
                    </div>

                    <div class="col-3">
                        <input type="number" name="quantity" value="1" min="1" class="form-control">
                    </div>

                    <div class="col-2">
                        <button class="btn btn-add w-100" type="submit">+</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>

    {{-- KERANJANG --}}
    <div class="col-md-6 mb-4">
        <div class="card pos-card">
            <div class="pos-header">🛒 Keranjang Pesanan</div>

            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sale->itemPenjualan as $item)
                        <tr>
                            <td><strong>☕ {{ $item->produk->nama }}</strong></td>
                            <td>
                                <form method="POST" action="{{ route('itempenjualan.update',$item->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item->kuantitas }}" class="form-control form-control-sm" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td>Rp {{ number_format($item->subtotal,0,',','.') }}</td>
                            <td>
                                @can('delete',$item)
                                <form method="POST" action="{{ route('itempenjualan.destroy',$item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">🗑</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">☕ Keranjang kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-white">
                <div class="total-box mb-3">
                    <small>Total Pembayaran</small>
                    <div class="total-price">Rp {{ number_format($sale->total_pembayaran,0,',','.') }}</div>
                </div>

                <form method="POST" action="{{ route('penjualan.update',$sale->id) }}" onsubmit="return confirm('Yakin ingin checkout?')">
                    @csrf
                    @method('PUT')

                    <select name="payment_method" id="payment_method" class="form-select mb-3">
                        <option value="">Pilih Pembayaran</option>
                        <option value="CASH">Cash</option>
                        <option value="QRIS">QRIS</option>
                    </select>

                    <!-- AREA DISPLAY QRIS -->
                    <div id="qris-area" style="display:none;" class="text-center mb-3">
                        {{-- GAMBAR QRIS + FALLBACK DUMMY QR --}}
                        <img src="{{ asset('qr/qris.jpg') }}" 
                             onerror="this.onerror=null;this.src='https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=COFFEE_BLOOM_QRIS';" 
                             class="img-fluid rounded-4 shadow" 
                             style="max-width:250px" 
                             alt="QRIS Pembayaran">
                        <p class="mt-2 text-muted fw-bold">Scan QRIS untuk pembayaran</p>
                    </div>

                    <!-- AREA CASH -->
                    <div id="cash-area" style="display:none;">
                        <label class="fw-bold mb-2">💵 Uang Bayar</label>
                        <input type="number" name="uang_bayar" id="uang_bayar" class="form-control mb-3" placeholder="Masukkan uang pelanggan">

                        <label class="fw-bold mb-2">💰 Kembalian</label>
                        <input type="text" id="kembalian" class="form-control mb-3" readonly>
                    </div>

                    <button class="btn btn-checkout w-100">☕ Checkout</button>
                </form>

                @can('delete',$sale)
                <form action="{{ route('penjualan.destroy',$sale->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger w-100 mt-3 btn-cancel">❌ Batal Transaksi</button>
                </form>
                @endcan

            </div>
        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function(){

    let total = {{ $sale->total_pembayaran }};

    const metode = document.getElementById('payment_method');
    const cashArea = document.getElementById('cash-area');
    const qrisArea = document.getElementById('qris-area');
    const bayar = document.getElementById('uang_bayar');
    const kembali = document.getElementById('kembalian');

    // Sembunyikan semua elemen saat halaman pertama kali dibuka
    cashArea.style.display = 'none';
    qrisArea.style.display = 'none';

    metode.addEventListener('change', function(){

        if(this.value === 'CASH'){
            cashArea.style.display = 'block';
            qrisArea.style.display = 'none';
        } else if(this.value === 'QRIS'){
            cashArea.style.display = 'none';
            qrisArea.style.display = 'block';
            bayar.value = '';
            kembali.value = '';
        } else {
            cashArea.style.display = 'none';
            qrisArea.style.display = 'none';
            bayar.value = '';
            kembali.value = '';
        }

    });

    bayar.addEventListener('input', function(){

        let uang = parseInt(this.value) || 0;
        let hasil = uang - total;

        kembali.value =
            hasil >= 0
            ? 'Rp ' + hasil.toLocaleString('id-ID')
            : 'Uang Kurang';

    });

});
</script>

@endsection