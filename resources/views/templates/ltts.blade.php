@extends('admin')
<!--></!-->   
@section('content')
<style type="text/css">
    .sss{
        position: fixed;
        z-index: 9999;
    }
</style>
<div ng-app="stater">
    <div class="input-group col-xs-1 sss">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-body">
                    <span>
                        TRAIN LIST
                    </span>
                    <small class="md-txt">
                        <a href="#/new">
                           <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                    </small>
                </div>
                <div class="input-group">
                    <div class="input-group-addon">
                        Sort by
                    </div>
                    <select class="form-control" ng-model="orderBy">
                        <option>
                            line
                        </option>
                        <option>
                            content
                        </option>
                        <option>
                            timestamp
                        </option>
                    </select>
                </div>
                <div class="input-group">
                    <div class="input-group-addon">
                        Search
                    </div>
                    <input type="text" class="form-control"  placeholder="" ng-model="searchText.routeTag"/>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div ng-view>
        </div>
    </div>
</div>
<script src="{{asset('/js/ltts.js')}}">
</script>
@endsection