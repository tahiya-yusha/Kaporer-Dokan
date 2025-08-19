<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<div>
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addBrandModal">Add Brands</h1>
          <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeBrand">

          <div class="modal-body">
            <div class="mb-3">
              <label>Brand Name</label>
              <input type="text" wire:model.defer="name" class="form-control" />
                @error('name') <small class = "text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
              <label>Brand Slug</label>
              <input type="text" wire:model.defer="slug" class="form-control" />
               @error('slug') <small class = "text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
              <label>Status</label>
              <input type="checkbox" wire:model.defer="status"/> Checked = Hidden, Un-Checked = Visible
              @error('status') <small class = "text-danger">{{ $message }}</small>
                @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          <div wire:loading class = "p-7">
            <div class = "spinner-border text-primary" role = "status">
                <span class = "visually hidden"></span>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/js/bootstrap.min.js" integrity="sha512-mp3VeMpuFKbgxm/XMUU4QQUcJX4AZfV5esgX72JQr7H7zWusV6lLP1S78wZnX2z9dwvywil1VHkHZAqfGOW7Nw==" crossorigin="anonymous"></script>


<!-- update brand modal -->

<div>
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addBrandModal">Update Brands</h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div wire:loading class = "p-7">
          <div class = "spinner-border text-primary" role = "status">
              <span class = "visually-hidden">Loading..</span>
          </div> Loading...
        </div>
        <div wire:loading.remove>



        <form wire:submit.prevent="updateBrand">

          <div class="modal-body">
            <div class="mb-3">
              <label>Brand Name</label>
              <input type="text" wire:model.defer="name" class="form-control" />
                @error('name') <small class = "text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
              <label>Brand Slug</label>
              <input type="text" wire:model.defer="slug" class="form-control" />
               @error('slug') <small class = "text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
              <label>Status</label>
              <input type="checkbox" wire:model.defer="status"/> Checked = Hidden, Un-Checked = Visible
              @error('status') <small class = "text-danger">{{ $message }}</small>
                @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/js/bootstrap.min.js" integrity="sha512-mp3VeMpuFKbgxm/XMUU4QQUcJX4AZfV5esgX72JQr7H7zWusV6lLP1S78wZnX2z9dwvywil1VHkHZAqfGOW7Nw==" crossorigin="anonymous"></script>


<!-- delete brand modal -->

<div>
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addBrandModal">Delete Brand</h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div wire:loading class = "p-7">
          <div class = "spinner-border text-primary" role = "status">
              <span class = "visually-hidden">Loading..</span>
          </div> Loading...
        </div>
        <div wire:loading.remove>



        <form wire:submit.prevent="destroyBrand">

          <div class="modal-body">
            <h4>Are you sure you want to delete this?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Yes, delete</button>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/js/bootstrap.min.js" integrity="sha512-mp3VeMpuFKbgxm/XMUU4QQUcJX4AZfV5esgX72JQr7H7zWusV6lLP1S78wZnX2z9dwvywil1VHkHZAqfGOW7Nw==" crossorigin="anonymous"></script>
