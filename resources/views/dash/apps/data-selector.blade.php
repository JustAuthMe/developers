<div class="row mb-3">
    <div class="col-md-3">
        <div class="list-group" id="list-tab" role="tablist">
            @foreach($available_category as $category => $available_data)
                @if(is_array($available_data))
                    <a class="list-group-item list-group-item-action {{ ($category === array_key_first($available_category)) ? 'active' : ''}}"
                       id="list-{{ $category }}-list" data-toggle="list"
                       href="#list-{{ $category }}" role="tab" aria-controls="{{ $category }}">
                        {{ __('dash.apps.'.$category) }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
    <div class="col-md-9">
        <div class="tab-content" id="nav-tabContent">
            @foreach($available_category as $category => $available_data)
                @if(is_array($available_data))
                    <div class="tab-pane fade {{ ($category === array_key_first($available_category)) ? 'show active' : ''}}"
                         id="list-{{ $category }}" role="tabpanel" aria-labelledby="list-{{ $category }}">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th><?= __('dash.apps.data-label'); ?></th>
                                <th><?= __('dash.apps.desired'); ?><br/>
                                    <small>
                                        <input type="checkbox" id="all_requested_{{ $category }}">
                                        <label for="all_requested_{{ $category }}">{{ __('dash.select-all') }}</label>
                                    </small>
                                </th>
                                <th><?= __('dash.apps.required'); ?><br/>
                                    <small>
                                        <input type="checkbox" id="all_required_{{ $category }}">
                                        <label for="all_required_{{ $category }}">{{ __('dash.select-all') }}</label>
                                    </small>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($category == 'identity')
                                <tr>
                                    <td>{{ __('dash.apps.email') }}</td>
                                    <td><input type="checkbox" checked="checked" disabled></td>
                                    <td><input type="checkbox" checked="checked" disabled></td>
                                </tr>
                            @endif
                            @foreach($available_data as $data)
                                <tr>
                                    <td>{{ __('dash.apps.' . $data) }}</td>
                                    <td><input type="checkbox"
                                               name="requested_data[]"
                                               value="{{ $data }}" {{ (isset($_POST['requested_data']) && in_array($data, $_POST['requested_data']) || (isset($app) && in_array($data, $app->data) || in_array($data.'!', $app->data))) ? 'checked="checked"' : '' }}>
                                    </td>
                                    <td><input type="checkbox"
                                               name="required_data[]"
                                               value="{{ $data }}" {{ (isset($_POST['requested_data']) && in_array($data, $_POST['required_data']) || (isset($app) && in_array($data.'!', $app->data))) ? 'checked="checked"' : '' }}>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
