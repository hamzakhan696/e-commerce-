<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sale Setting
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateSale">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Sale Date</label>
                                    <div class="col-md-4">
                                        <input type="date" id="sale-date"placeholder="YYY/MM/DD H:M:S" class="form-control input-md" wire:model="sale_date"/>
                                    </div>
                            </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@push('scripts')
    <script src=
            "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
    </script>
<script>
    $('#sale-date').change(function(){
        var data=$('#sale-date').val();
        @this.set('sale_date',data);
    });
</script>
@endpush
