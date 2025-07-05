@props(['col' => 1,'title' => null, 'desc' => null])

<div {{
    $attributes->class([
        'col-span-full grid gap-5 group-[.is-modal]/modal:!grid-cols-1',
        'grid-cols-1 lg:grid-cols-2'=> $col === 1,
        'grid-cols-1 lg:grid-cols-2'=> $col === 2,
        'grid-cols-1 lg:grid-cols-3'=> $col === 3,
        'grid-cols-1 lg:grid-cols-4'=> $col === 4,
        'grid-cols-1 lg:grid-cols-5'=> $col === 5,
    ])
}}>
    <x-layout.panel.form.header small :header="false" :title="$title" :desc="$desc" class="col-span-full"/>
    {{ $slot }}
</div>

