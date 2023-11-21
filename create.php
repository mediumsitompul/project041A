import 'dart:convert';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:http/http.dart' as http;
import 'create_success.dart';

class CreateData extends StatelessWidget {
  const CreateData({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        appBar: AppBar(
          title: const Center(child: Text("CRUD OPERATION\n(CREATE DATA)")),
        ),
        body: CreateData1(),
      ),
    );
  }
}

class CreateData1 extends StatefulWidget {
  const CreateData1({super.key});

  @override
  State<CreateData1> createState() => _CreateData1State();
}

class _CreateData1State extends State<CreateData1> {
  TextEditingController ctrStudentId = TextEditingController();
  TextEditingController ctrStudentName = TextEditingController();
  TextEditingController ctrGender = TextEditingController();
  TextEditingController ctrAddress = TextEditingController();
  TextEditingController ctrMajor = TextEditingController();
  TextEditingController ctrPhone = TextEditingController();

  Future<void> _create() async {
    final url = Uri.parse(
      //'https://mediumsitompul.com/crud_restapi/create.php',
      'http://192.168.100.240:8087/crud_restapi/create.php',
    );
    var response = await http.post(url, body: {
      "studentId": ctrStudentId.text,
      "studentName": ctrStudentName.text,
      "gender": ctrGender.text,
      "address": ctrAddress.text,
      "major": ctrMajor.text,
      "phone": ctrPhone.text,
    });

    final result1 = jsonDecode(response.body);

    if (result1.toString() == 'success') {
      Navigator.push(
        context,
        MaterialPageRoute(builder: (context) => CreateDataSuccess()),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          //...........................................................
          SizedBox(
            height: 56,
            width: 185,
            child: TextField(
              inputFormatters: [FilteringTextInputFormatter.digitsOnly],
              maxLength: 16,
              controller: ctrStudentId,
              decoration: InputDecoration(
                  border: OutlineInputBorder(), labelText: '1. Student_id'),
            ),
          ),
          //..........................................................

          SizedBox(
            height: 56,
            width: 185,
            child: TextField(
              maxLength: 100,
              controller: ctrStudentName,
              decoration: const InputDecoration(
                  border: OutlineInputBorder(), labelText: '2. Student_name'),
            ),
          ),

          //.....................................................................

          SizedBox(
            height: 56,
            width: 185,
            child: TextField(
              maxLength: 1,
              controller: ctrGender,
              decoration: const InputDecoration(
                  border: OutlineInputBorder(), labelText: '3. Gender'),
            ),
          ),

          //.....................................................................

          SizedBox(
            height: 56,
            width: 185,
            child: TextField(
              maxLength: 150,
              controller: ctrAddress,
              decoration: const InputDecoration(
                  border: OutlineInputBorder(), labelText: '4. Address'),
            ),
          ),
          //.....................................................................
          SizedBox(
            height: 56,
            width: 185,
            child: TextField(
              maxLength: 50,
              controller: ctrMajor,
              decoration: const InputDecoration(
                  border: OutlineInputBorder(), labelText: '5. Major'),
            ),
          ),

          //.....................................................................

          SizedBox(
            height: 56,
            width: 185,
            child: TextField(
              inputFormatters: [FilteringTextInputFormatter.digitsOnly],
              maxLength: 16,
              controller: ctrPhone,
              decoration: const InputDecoration(
                  border: OutlineInputBorder(), labelText: '6. Phone'),
            ),
          ),
          //.....................................................................

          Padding(
            padding: const EdgeInsets.fromLTRB(100, 10, 100, 10),
            child: ElevatedButton(
                onPressed: () {
                  _create();
                },
                child: const Center(child: Text("CREATE DATA"))),
          )
        ],
      ),
    );
  }
}
