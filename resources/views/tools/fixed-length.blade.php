<?php
use App\Util;
?>
@extends('layout.wide')

@section('title')
    Fixec length file
@endsection

@section('contents')
    <h1>Fixed length file</h1>

    <?php Util::showMessage('error') ?>
    <?php Util::showMessage('success') ?>

    <form method="post" action="{{ URL::current() }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="file">File</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="file">
                                <label class="custom-file-label" for="customFile" id="filename">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" name="type" id="type">
                                @foreach($files as $key => $val)
                                <option value="{{ $key }}" @if($key==@$post['type'])@ selected @endif>{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <div class="form-group">
                            <label for="encoding">Encoding</label>
                            <input type="text" class="form-control" name="encoding" value="{{ @$post['encoding'] }}">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <div class="form-group">
                            <label for="type">Replace space</label>
                            <input type="text" class="form-control" name="replace" value="{{ @$post['replace'] }}">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <div>
                                <input type="submit" value="Upload" class="btn btn-sm btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($rows)
            @php
                $lineNo = 0;
            @endphp
            <h4 class="mt-3">Parsed</h4>
            @foreach($rows as $row)
                @php
                    $no = 0;
                @endphp
                <div class="card fixed-parsed">
                    <div class="card-header line-no">
                        {{ ++$lineNo }}行目
                        <span class="badge badge-primary">{{ $row['total'] }}</span>
                    </div>
                    <div class="card-body parsed-columns">
                        <table class="table table-striped table-bordered fixed-length">
                            <tr>
                                <th>No.</th>
                                <th>バイト数</th>
                                <th>開始位置</th>
                                <th>項目名</th>
                                <th>値</th>
                            </tr>
                            @foreach($row['columns'] as $column)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td class="text-right">{{ $column['len'] }}</td>
                                    <td class="text-right">{{ $column['pos'] }}</td>
                                    <td class="nowrap">{{ $column['name'] }}</td>
                                    <td>{{ $column['value'] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @endforeach
        @endif
    </form>

    <div class="fixed-action-btn">
        <a href="#" class="btn-floating shadow expand-btn bg-warning" data-toggle="tooltip" title="Expand">
            <i class="fas fa-folder-open"></i>
        </a>
        <a href="#" class="btn-floating shadow fold-btn bg-primary" data-toggle="tooltip" title="Fold">
            <i class="fas fa-folder"></i>
        </a>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('input[name=file]').on('change', function()
            {
                if (this.files.length > 0) {
                    $('#filename').text(this.files[0].name);
                }
            });

            $('.parsed-columns').hide();
            $('.line-no').on('click', function() {
                $(this).closest('div.card').find('.parsed-columns').toggle();
            });

            $('.expand-btn').on('click', function() {
                $('.parsed-columns').show();
            });
            $('.fold-btn').on('click', function() {
                $('.parsed-columns').hide();
            });
        });
    </script>
@endsection
