<x-mail::message>
# {{$data['name']}}
# {{$data['email']}}
# {{$data['phone']}}

<p>
    {{$data['note']}}
</p>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{$data['name']}}
</x-mail::message>
