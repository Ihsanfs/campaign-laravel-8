<section>
    <div class="col-lg-5">
        <div class="details-payment p-4 mt-3" style="background-color: #f3f3f3; border-radius: 10px;">
           <form action="{{ route('donasi.store', $id) }}" method="POST">
              @csrf
              <div class="form-group mt-2">
                 <label for="nama">Nominal</label>
                 <input required type="number" class="form-control" name="amount" min="1000" step="1000">
              </div>
              <div class="form-group mt-2">
                 <div class="row">
                    <div class="col-md-6">
                       <label for="name">Nama</label>
                       <input required type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                       <label for="nama">No. HP</label>
                       <input required type="text" class="form-control" name="phone">
                    </div>
                 </div>
              </div>
              <div class="form-group mt-2">
                 <label for="nama">Email</label>
                 <input required type="email" class="form-control" name="email">
              </div>
              <div class="form-group mt-2">
                 <label for="nama">Alamat lengkap</label>
                 <textarea required name="address" id="" cols="30" rows="4" class="form-control"></textarea>
              </div>
              <div class="mt-3">
                 <button type="submit" class="btn common-btn w-100">Donasi</button>
              </div>
           </form>
        </div>
</section>
