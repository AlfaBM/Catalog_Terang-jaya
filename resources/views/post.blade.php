<div class="col-md-3 col-sm-4">
    <div class="card card-custom">
        <div class="card-image">
            <img src="{{ $product->image_url }}" alt="Gambar {{ $product->nama }}">
        </div>
        <div class="card-body d-flex flex-column text-center">
            <h4>{{ $product->nama }}</h4>
            <h3 class="font-weight-normal text-red">{{ format_rupiah($product->harga_jual) }}</h3>
            <div class="text-muted">Supplier: <a
                    href="{{ url('/?supplier=' . $product->supplier_id) }}">{{ $product->supplier->nama }}</a></span>
            </div>
        </div>
    </div>
</div>
