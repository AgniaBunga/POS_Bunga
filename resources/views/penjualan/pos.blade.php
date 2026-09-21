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
.form-control, .form-select {
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

/* TOTAL & DISKON BOX */
.total-box {
    background:
    linear-gradient(
        135deg,
        #f8d7d0,
        #fff0eb
    );
    border-radius:25px;
    padding:20px;
}

.subtotal-text {
    color:#7a4f44;
    font-weight:600;
    font-size:14px;
}

.discount-text {
    color:#dc3545;
    font-weight:700;
    font-size:14px;
}

.total-price {
    color:#c06b5d;
    font-size:30px;
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

/* POPUP CUSTOM (TANPA BOOTSTRAP JS) */
.custom-alert-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.6);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 99999;
}

.custom-alert-box {
    background: #fff0eb;
    border: 3px solid #dc3545;
    border-radius: 25px;
    padding: 35px;
    max-width: 500px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    animation: popupAnim 0.3s ease-out;
}

@keyframes popupAnim {
    from { transform: scale(0.7); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}
</style>

{{-- ALERT SERVER-SIDE --}}
@if (isset($errors) && is_object($errors) && method_exists($errors, 'any') && $errors->any())
<div class="alert alert-danger rounded-4 p-3 shadow-sm mb-4">
    <h4 class="fw-bold mb-1">⚠️ Terjadi Kesalahan!</h4>
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@elseif (session('error_message'))
<div class="alert alert-danger rounded-4 p-3 shadow-sm mb-4">
    <h4 class="fw-bold mb-1">⚠️ Terjadi Kesalahan!</h4>
    <div>{{ session('error_message') }}</div>
</div>
@endif

@if(session('success'))
<div class="alert alert-success rounded-4 p-3 shadow-sm mb-4">
    ☕ {{ session('success') }}
</div>
@endif

@if($sale->status === 'COMPLETED')
<div class="alert alert-success rounded-4 p-3 shadow-sm mb-4">
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
                <form method="POST" action="{{ route('itempenjualan.store') }}" class="row mb-3 align-items-center form-add-item" data-stok="{{ $product->stok }}" data-nama="{{ $product->nama }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="col-7">
                        <button class="btn product-item w-100 text-start" type="submit">
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ asset('storage/'.$product->foto) }}" 
                                     onerror="this.onerror=null;this.src='https://via.placeholder.com/60?text=Coffee';" 
                                     class="product-img" 
                                     alt="{{ $product->nama }}">
                                <div>
                                    <div class="fw-bold">{{ $product->nama }}</div>
                                    <small class="price-text">Rp {{ number_format($product->harga_jual,0,',','.') }}</small>
                                    <small class="d-block text-muted" style="font-size: 11px;">Stok: {{ $product->stok }}</small>
                                </div>
                            </div>
                        </button>
                    </div>

                    <div class="col-3">
                        <input type="number" name="quantity" value="1" min="1" class="form-control input-qty">
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
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $subtotalItem = 0; @endphp
                        @forelse($sale->itemPenjualan as $item)
                        @php $subtotalItem += $item->subtotal; @endphp
                        <tr>
                            <td>
                                <strong>☕ {{ $item->produk->nama }}</strong>
                                <small class="d-block text-muted" style="font-size: 11px;">Sisa stok: {{ $item->produk->stok }}</small>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('itempenjualan.update',$item->id) }}" class="form-update-item" data-stok="{{ $item->produk->stok }}" data-nama="{{ $item->produk->nama }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item->kuantitas }}" min="1" class="form-control form-control-sm input-qty-cart">
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

            <div class="card-footer bg-white p-4">

                <form method="POST" action="{{ route('penjualan.update',$sale->id) }}" onsubmit="return confirm('Yakin ingin checkout?')">
                    @csrf
                    @method('PUT')

                    {{-- INPUT DISKON PENJUALAN --}}
                    <div class="mb-3">
                        <label class="fw-bold mb-1" style="color: #7a4f44;">🏷️ Diskon Penjualan (%)</label>
                        <input type="number" 
                               name="diskon" 
                               id="diskon_input" 
                               class="form-control" 
                               placeholder="Masukkan diskon (misal: 10)" 
                               value="{{ old('diskon', $sale->diskon ?? 0) }}" 
                               min="0" 
                               max="100">
                    </div>

                    {{-- RINGKASAN PEMBAYARAN --}}
                    <div class="total-box mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="subtotal-text">Subtotal Item:</span>
                            <span class="fw-bold" id="text-subtotal">Rp {{ number_format($subtotalItem,0,',','.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="discount-text">Potongan Diskon:</span>
                            <span class="discount-text" id="text-potongan">- Rp 0</span>
                        </div>
                        <hr style="border-top: 2px dashed #c79288; opacity: 0.5;">
                        <div class="text-center">
                            <small class="text-muted fw-bold">TOTAL AKHIR PEMBAYARAN</small>
                            <div class="total-price" id="text-total-akhir">Rp {{ number_format($subtotalItem,0,',','.') }}</div>
                        </div>
                    </div>

                    <select name="payment_method" id="payment_method" class="form-select mb-3" required>
                        <option value="">Pilih Pembayaran</option>
                        <option value="CASH">Cash</option>
                        <option value="QRIS">QRIS</option>
                    </select>

                    <!-- AREA DISPLAY QRIS -->
                    <div id="qris-area" style="display:none;" class="text-center mb-3">
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

<!-- POPUP CUSTOM WARNING STOK -->
<div id="customAlertOverlay" class="custom-alert-overlay">
    <div class="custom-alert-box">
        <div style="font-size: 70px;">⚠️</div>
        <h1 style="color: #dc3545; font-weight: 800; font-size: 30px; margin-bottom: 15px;">STOK TIDAK CUKUP!</h1>
        <p id="alertMsgMenu" style="font-size: 18px; color: #333; margin-bottom: 10px;"></p>
        <div id="alertMsgDetail" style="background: #dc3545; color: white; padding: 10px 15px; border-radius: 12px; font-weight: bold; font-size: 16px; margin-bottom: 20px; display: inline-block;"></div>
        <div>
            <button id="btnCloseAlert" style="background: #dc3545; color: white; border: none; padding: 12px 35px; border-radius: 20px; font-weight: bold; font-size: 16px; cursor: pointer;">Tutup / Mengerti</button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){

    const rawSubtotal = {{ $subtotalItem }};
    
    const diskonInput = document.getElementById('diskon_input');
    const textPotongan = document.getElementById('text-potongan');
    const textTotalAkhir = document.getElementById('text-total-akhir');

    const metode = document.getElementById('payment_method');
    const cashArea = document.getElementById('cash-area');
    const qrisArea = document.getElementById('qris-area');
    const bayar = document.getElementById('uang_bayar');
    const kembali = document.getElementById('kembalian');

    let currentTotalAkhir = rawSubtotal;

    // FUNGSI HITUNG TOTAL AKHIR & KEMBALIAN SECARA REALTIME
    function hitungTotal() {
        let persenDiskon = parseFloat(diskonInput.value) || 0;
        if (persenDiskon > 100) persenDiskon = 100;
        if (persenDiskon < 0) persenDiskon = 0;

        let nominalPotongan = rawSubtotal * (persenDiskon / 100);
        currentTotalAkhir = rawSubtotal - nominalPotongan;

        textPotongan.innerText = '- Rp ' + nominalPotongan.toLocaleString('id-ID');
        textTotalAkhir.innerText = 'Rp ' + currentTotalAkhir.toLocaleString('id-ID');

        hitungKembalian();
    }

    function hitungKembalian() {
        if(metode.value === 'CASH') {
            let uang = parseInt(bayar.value) || 0;
            let hasil = uang - currentTotalAkhir;

            kembali.value = hasil >= 0
                ? 'Rp ' + hasil.toLocaleString('id-ID')
                : 'Uang Kurang';
        }
    }

    diskonInput.addEventListener('input', hitungTotal);
    bayar.addEventListener('input', hitungKembalian);

    // ELEMENT CUSTOM ALERT
    const overlay = document.getElementById('customAlertOverlay');
    const msgMenu = document.getElementById('alertMsgMenu');
    const msgDetail = document.getElementById('alertMsgDetail');
    const btnClose = document.getElementById('btnCloseAlert');

    function tampilkanWarning(namaMenu, stok, qty) {
        msgMenu.innerText = 'Permintaan untuk "' + namaMenu + '" melebihi batas stok!';
        msgDetail.innerText = 'Stok Tersedia: ' + stok + ' | Dipesan: ' + qty;
        overlay.style.display = 'flex';
    }

    btnClose.addEventListener('click', function() {
        overlay.style.display = 'none';
    });

    // CHECK STOK SAAT TAMBAH DARI MENU
    document.querySelectorAll('.form-add-item').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            let stokTersedia = parseInt(this.getAttribute('data-stok')) || 0;
            let namaProduk = this.getAttribute('data-nama');
            let inputQty = parseInt(this.querySelector('.input-qty').value) || 0;

            if (inputQty > stokTersedia) {
                e.preventDefault();
                tampilkanWarning(namaProduk, stokTersedia, inputQty);
            }
        });
    });

    // CHECK STOK SAAT DIUBAH DI KERANJANG
    document.querySelectorAll('.form-update-item').forEach(function(form) {
        let inputQty = form.querySelector('.input-qty-cart');
        
        inputQty.addEventListener('change', function() {
            let stokTersedia = parseInt(form.getAttribute('data-stok')) || 0;
            let namaProduk = form.getAttribute('data-nama');
            let valQty = parseInt(this.value) || 0;

            if (valQty > stokTersedia) {
                tampilkanWarning(namaProduk, stokTersedia, valQty);
            } else {
                form.submit();
            }
        });
    });

    // Sembunyikan area pembayaran awal
    cashArea.style.display = 'none';
    qrisArea.style.display = 'none';

    metode.addEventListener('change', function(){
        if(this.value === 'CASH'){
            cashArea.style.display = 'block';
            qrisArea.style.display = 'none';
            bayar.setAttribute('required', 'required');
        } else if(this.value === 'QRIS'){
            cashArea.style.display = 'none';
            qrisArea.style.display = 'block';
            bayar.removeAttribute('required');
            bayar.value = '';
            kembali.value = '';
        } else {
            cashArea.style.display = 'none';
            qrisArea.style.display = 'none';
            bayar.removeAttribute('required');
            bayar.value = '';
            kembali.value = '';
        }
        hitungKembalian();
    });

    // Jalankan kalkulasi pertama kali saat halaman dimuat
    hitungTotal();

});
</script>

@endsection