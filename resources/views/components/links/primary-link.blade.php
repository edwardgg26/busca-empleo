<a {{$attributes->merge(['class'=>"underline text-primary rounded-md
                                   hover:text-primary_darken
                                   dark:text-dark_primary dark:hover:text-dark_primary_ligthen"])}}>
    {{ $slot }}
</a>