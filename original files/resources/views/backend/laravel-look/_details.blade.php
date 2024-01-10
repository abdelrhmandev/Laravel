<textarea readonly cols="130" rows="10">
    {!! json_encode($model->get('context'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</textarea>
