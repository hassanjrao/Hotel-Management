<div>
    <select required class="form-select js-select2" name="release_status"  data-placeholder="Select Release Status" >
        
        @foreach ($releaseStatuses as $release)
            <option {{ $release->code=="published" ? "selected" : "" }} value="{{ $release->code }}" >
                {{ $release->name }}
            </option>
        @endforeach

    </select>
</div>
