@extends('layouts.admin')
@section('content')
    <div class="">
        <div class="page-title">
            <h3><?= $title ?></h3>
            <form class="filter-form" action="{{route('listing.index',['model'=>$modelName])}}" method="POST">
                @csrf
                <fieldset>
                    <legend>Tìm kiếm:</legend>
                    <?php
                    foreach ($configs as $config) {
                    if (!empty($config['filter'])) {
                    switch ($config['filter']) {
                    case "search":
                        ?>
                    <button type="submit" class="btn btn-primary">Tìm</button>
                        <?php
                        break;
                    case "add_data":
                        ?>
                    <a class="btn btn-primary" href="{{route('editing.create',['model'=>$modelName])}}">Thêm</a>
                        <?php
                        break;
                    case "equal":
                        ?>
                    <div class="filter-item">
                        <label><?= $config['name'] ?>: </label>
                        <input type="text" name="<?= $config['field'] ?>"
                               value="<?= (!empty($config['filter_value'])) ? $config['filter_value'] : "" ?>"/>
                    </div>
                        <?php
                        break;
                    case "like":
                        ?>
                    <div class="filter-item">
                        <label><?= $config['name'] ?>: </label>
                        <input type="text" name="<?= $config['field'] ?>"
                               value="<?= (!empty($config['filter_value'])) ? $config['filter_value'] : "" ?>"/>
                    </div>
                        <?php
                        break;
                    case "between":
                        ?>
                    <div class="filter-item">
                        <label><?= $config['name'] ?> từ: </label>
                        <input type="text" name="<?= $config['field'] ?>[from]"
                               value="<?= (!empty($config['filter_from_value'])) ? $config['filter_from_value'] : "" ?>"/>
                        <label>Đến: </label>
                        <input type="text" name="<?= $config['field'] ?>[to]"
                               value="<?= (!empty($config['filter_to_value'])) ? $config['filter_to_value'] : "" ?>"/>
                    </div>
                        <?php
                        break;
                    }
                    }
                    }
                    ?>
                </fieldset>
            </form>
        </div>

        <div class="clearfix"></div>

        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Bordered table <small>Bordered table subtitle</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <?php foreach ($configs as $config) { ?>
                                    <?php if (!empty($config['sort'])) { ?>
                                    <?php if ($orderBy['field'] == $config['field']) { ?>
                                    <?php if ($orderBy['sort'] == "desc") { ?>
                                <th><?= $config['name'] ?><a class="sort-icon"
                                                             href="{{route('listing.index',['model'=>$modelName,'sort'=>$config['field'].'_asc'])}}"><i
                                            class="fa fa-sort-desc" aria-hidden="true"></i></a></th>
                                <?php } else { ?>
                                <th><?= $config['name'] ?><a class="sort-icon"
                                                             href="{{route('listing.index',['model'=>$modelName,'sort'=>$config['field'].'_desc'])}}"><i
                                            class="fa fa-sort-asc" aria-hidden="true"></i></a></th>
                                <?php } ?>
                                <?php } else { ?>
                                <th><?= $config['name'] ?><a class="sort-icon"
                                                             href="{{route('listing.index',['model'=>$modelName,'sort'=>$config['field'].'_desc'])}}"><i
                                            class="fa fa-sort" aria-hidden="true"></i></a></th>
                                <?php } ?>
                                <?php } else { ?>
                                <th><?= $config['name'] ?></th>
                                <?php } ?>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($records as $record) {
                                ?>
                            <tr>
                                    <?php foreach ($configs as $config) { ?>
                                    <?php
                                switch ($config['type']) {
                                case 'ckeditor':
                                    ?>
                                <td><?= $record[$config['field']] ?></td>
                                    <?php
                                    break;
                                case "text":
                                    ?>
                                <td><?= $record[$config['field']] ?></td>
                                    <?php
                                    break;
                                case "image":
                                    ?>
                                <td><img height="75" onerror="this.src='/admin_images/no-avatar.png'"
                                         src="<?= $record[$config['field']] ?>"/></td>
                                    <?php
                                    break;
                                case "number":
                                    ?>
                                <td><?= number_format($record[$config['field']], 0, ',', '.') ?></td>
                                    <?php
                                    break;
                                case "edit":
                                    ?>
                                <td><a href="{{ route('listing.edit', ['model' => $modelName, 'id' => $record->id]) }}"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Sửa</a></td>
                                    <?php
                                    break;
                                case "delete":
                                    ?>
                                <td>
                                    <a href="{{ route('listing.delete', ['model' => $modelName, 'id' => $record->id]) }}"><i
                                            class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Xóa</a>
                                </td>
                                    <?php
                                    break;

                                case "deleteplayer":
                                    ?>
                                <td>
                                    <a href="{{ route('listing.deleteplayer', ['model' => $modelName, 'id' => $record->id]) }}"><i
                                            class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Xóa</a>
                                </td>
                                    <?php
                                    break;
                                case "date":
                                    ?>
                                <td><?= date("Y-m-d", strtotime($record[$config['field']])) ?></td>
                                    <?php
                                    break;
                                case "view":
                                    ?>
                                <td>
                                    <a  href="{{route('admin.orderdetail', ['id' => $record->id])}}"><i class="bi bi-eye-fill" aria-hidden="true"></i>&nbspView</a>
                                </td>
                                    <?php
                                    break;
                                }
                                    ?>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                            </tbody>
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </table>
                        <?= $records->links("pagination::bootstrap-4") ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection


