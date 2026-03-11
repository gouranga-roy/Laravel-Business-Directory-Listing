<div class="row">

    @foreach ($fieldGet as $field)
        <div class="col-md-6">

            @if ($field->field == 'text' || $field->field == 'email' || $field->field == 'number')
                <x-input type="{{ $field->field }}" label="{{ translate($field->label) }}" name="custom_fields[{{ $field->id }}]" placeholder="{{ $field->placeholder ?? $field->placeholder }}" note="{{ $field->is_required ? '*' : '' }}" value="{{ old('custom_fields.' . $field->id) }}" />
            @elseif ($field->field == 'textarea')
                <x-textarea label="{{ translate($field->label) }}" name="custom_fields[{{ $field->id }}]" placeholder="{{ $field->placeholder ?? $field->placeholder }}" row="3"></x-textarea>
            @elseif ($field->field == 'select')
                <div class="mb-3">
                    <x-select name="custom_fields[{{ $field->id }}]" id="custom_fields[{{ $field->id }}]" label="{{ translate($field->label) }}" placeholder="Select option">
                        <option value=""></option>
                        @foreach ($field->options ?? [] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </x-select>
                </div>
            @elseif ($field->field == 'checkbox')
                <div class="mb-3">

                    <label class="mb-10">{{ translate($field->label) }}</label>

                    <div class="d-flex align-items-center gap-2 column-gap-4 flex-wrap">
                        @foreach ($field->options ?? [] as $option)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $option }}" name="custom_fields[{{ $field->id }}]" id="custom_check_{{ $option . '_' . $loop->iteration }}" @if ($loop->first) checked @endif>
                                <label class="form-check-label text-capitalize" for="custom_check_{{ $option . '_' . $loop->iteration }}">
                                    {{ $option }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                </div>
            @elseif ($field->field == 'radio')
                <div class="mb-3">
                    <label class="mb-10">{{ translate($field->label) }}</label>
                    <div class="d-flex align-items-center gap-4 flex-wrap">

                        @foreach ($field->options ?? [] as $option)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="{{ $option }}" name="custom_fields[{{ $field->id }}]" id="custom_radio{{ $loop->iteration }}" @if ($loop->first) checked @endif>
                                <label class="form-check-label" for="custom_radio{{ $loop->iteration }}">
                                    {{ $option }}
                                </label>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif
        </div>
    @endforeach

</div>
