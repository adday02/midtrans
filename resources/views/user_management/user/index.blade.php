@extends('layouts.app')
@section('content')
    <x-content>
        @slot('title') User @endslot
        @slot('subTitle') Management Sistem @endslot
        @slot('body')
            <x-card large="12">
                @slot('title') Data User @endslot
                @slot('body')
                <div class="col-lg-12">
                    <button type="button" class="btn btn-primary" onclick="create()" style="float: right">
                        Create User
                    </button>
                </div><br><br>
                    <x-short-table id="datatable">
                        @slot('column')
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">status</th>
                            <th scope="col">Action</th>
                        @endslot
                    </x-short-table>
                @endslot
            </x-card>

            <x-modal id="modal-form" button="btn-save" click="store()">
                @slot('body')
                    <form id="form">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Your Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password">
                            </div>
                        </div>
                        <input type="hidden" id="id" name="id">
                    </form>
                @endslot
            </x-modal>
        @endslot
    </x-content>
@endsection
@include('user_management.user.script')