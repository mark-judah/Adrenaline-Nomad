<div>
    <!-- component -->
    <!-- This is an example component -->

    <!-- component -->
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet"
    />

    <div class="justify-center min-h-screen bg-white">

                <table class="table text-gray-400  space-y-6 text-sm">
                    <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="p-3">Visit Id</th>
                        <th class="p-3 text-left">Visitor Id</th>
                        <th class="p-3 text-left">Page Visited</th>
                        <th class="p-3 text-left">Previous Page</th>
{{--                        <th class="p-3 text-left">User Agent</th>--}}
                        <th class="p-3 text-left">Device</th>
                        <th class="p-3 text-left">Platform</th>
                        <th class="p-3 text-left">Browser</th>
                        <th class="p-3 text-left">Ip Address</th>
                        <th class="p-3 text-left">Time</th>


                    </tr>
                    </thead>
                    <tbody>

                    @foreach($analyticsData as $data)

                        <tr class="bg-blue-200 lg:text-black">
                        <td class="p-3">{{$data->id}}</td>
                        <td class="p-3">{{$data->visitor_id}}</td>
                        <td class="p-3">{{$data->url}}</td>
                        <td class="p-3">{{$data->referer}}</td>
{{--                        <td class="p-3">{{$data->useragent}}</td>--}}
                        <td class="p-3">{{$data->device}}</td>
                        <td class="p-3">{{$data->platform}}</td>
                        <td class="p-3">{{$data->browser}}</td>
                        <td class="p-3">{{$data->ip}}</td>
                        <td class="p-3">{{$data->created_at}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
    </div>
</div>

