<?php

function add(Request $request)
    {
        $query = DB::table('devices')->insert([
            "device_id" => $request->input('device_id'),
            "device_type" => $request->input('device_type'),
            "device_unit" => $request->input('device_unit'),
            "device_reading" => $request->input('device_reading'),
            "device_location" => $request->input('device_location'),
            "floor_level" => $request->input('floor_level'),
            "window_id" => $request->input('window_id'),
            "door_id" => $request->input('door_id'),
            "device_status" => $request->input('device_status'),
            "device_health" => $request->input('device_health'),
            "device_uptime" => $request->input('device_uptime'),
            "device_ip" => $request->input('device_ip'),
            "device_subnet" => $request->input('device_subnet'),
            "user_id" => $request->input('user_id'),
            "device_name" => $request->input('device_name'),
            "image" => $request->file('device_image')->getClientOriginalName(),
            "device_location" => $request->file('location_image')->getClientOriginalName(),
            "created_at" => date('Y-m-d'),
            "updated_at" => date('Y-m-d')
        ]);

        if ($query) {

            $factory = (new Factory)->withServiceAccount('../resources/credentials/iot-management-bfa20-firebase-adminsdk-xoj7c-8ad55b513e.json');
            $storage = $factory->createStorage();
            $image = $request->file('device_image'); //image file from frontend
            $location_image = $request->file('location_image'); //image file from frontend

            $localfolder = public_path('firebase-temp-uploads') . '/';
            $localfolder2 = public_path('firebase-temp-uploads') . '/location/';
            $extension = $image->getClientOriginalExtension();
            $file = $request->file('device_image')->getClientOriginalName();
            $file2 = $request->file('location_image')->getClientOriginalName();
            $image->move($localfolder, $file);
            $location_image->move($localfolder2, $file2);
            $uploadedfile = fopen($localfolder . $file, 'r');
            $uploadedfile2 = fopen($localfolder2 . $file2, 'r');
            $firebase_storage_path = 'Images/';
            $firebase_storage_path2 = 'Locations/';
            $storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $request->file('device_image')->getClientOriginalName()]);
            $storage->getBucket()->upload($uploadedfile2, ['name' => $firebase_storage_path2 . $request->file('location_image')->getClientOriginalName()]);
            // unlink($localfolder . $file);
            return back()->with('success', 'Record has been successfully inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }