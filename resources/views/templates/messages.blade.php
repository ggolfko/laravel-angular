@extends('admin')
<!--></!-->
@section('content')
<div class="col-md-6 col-lg-4" ng-app="stater" ng-controller="ListCtrl">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Team Chat
                <ul class="rad-panel-action">
                    <li>
                        <i class="fa fa-chevron-down">
                        </i>
                    </li>
                    <li>
                        <i class="fa fa-close">
                        </i>
                    </li>
                </ul>
            </h3>
        </div>
        <div class="panel-body">
            <div class="rad-chat-body">
                <div class="rad-list-group">
                    <div ng-view=""></div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <form class="input-group" ng-submit="addListItem(customQuote)">
                <input class="form-control" id="rad-chat-txt" placeholder="Type a message" type="text" ng-model="customQuote"/>
                <span class="input-group-btn">
                    <button class="btn btn-info" id="rad-chat-sendChat" ng-disabled="customQuoteForm.$invalid">
                        Send
                    </button>
                </span>
            </form>
        </div>
    </div>
</div>
<!--></!-->
<script src="{{asset('/js/messages.js')}}"></script>
@endsection
