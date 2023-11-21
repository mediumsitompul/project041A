import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_studentsid_search/create.dart';

main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        appBar: AppBar(
          backgroundColor: Colors.red,
          title: Center(child: Text('CRUD OPERATION')),
        ),
        body: MainMenu(),
      ),
    );
  }
}

class MainMenu extends StatefulWidget {
  const MainMenu({Key? key}) : super(key: key);

  @override
  State<MainMenu> createState() => _MainMenuState();
}

class _MainMenuState extends State<MainMenu> {
  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    //initial();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Padding(
        padding: const EdgeInsets.all(26.0),
        child: ListView(
          children: <Widget>[
            const SizedBox(
              height: 40,
            ),

            const Text(
              " Main Menu CRUD",
              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
            ),

            const SizedBox(
              height: 40,
            ),

            //.....................................................................

            Padding(
              padding: const EdgeInsets.fromLTRB(2, 2, 140, 2),
              child: ElevatedButton(
                  onPressed: () {
                    Navigator.pushReplacement(
                        context,
                        MaterialPageRoute(
                            builder: (context) => const CreateData()));
                  },
                  child: const Align(
                      alignment: Alignment.centerLeft,
                      child: Text("01. CREATE"))),
            ),
            //.................................................................
            Padding(
              padding: const EdgeInsets.fromLTRB(2, 2, 80, 2),
              child: Row(
                children: [
                  ElevatedButton(
                      onPressed: () {
                        // Navigator.pushReplacement(
                        //     context,
                        //     MaterialPageRoute(
                        //         builder: (context) => const MyRead()));
                      },
                      child: const Align(
                          alignment: Alignment.centerLeft,
                          child: Text("02. READ"))),
                  SizedBox(
                    width: 10,
                  ),
                  ElevatedButton(
                      onPressed: () {
                        // Navigator.pushReplacement(context,
                        //     MaterialPageRoute(builder: (context) => ReadAll()));
                      },
                      child: const Align(
                          alignment: Alignment.centerLeft,
                          child: Text("READ ALL"))),
                ],
              ),
            ),
            //........................................................................

            Padding(
              padding: const EdgeInsets.fromLTRB(2, 2, 140, 2),
              child: ElevatedButton(
                  onPressed: () {
                    // Navigator.pushReplacement(context,
                    //     MaterialPageRoute(builder: (context) => MyRead()));
                  },
                  child: const Align(
                      alignment: Alignment.centerLeft,
                      child: Text("03. UPDATE"))),
            ),
            //.....................................................................
            Padding(
              padding: const EdgeInsets.fromLTRB(2, 2, 140, 2),
              child: ElevatedButton(
                  onPressed: () {
                    // Navigator.pushReplacement(context,
                    //     MaterialPageRoute(builder: (context) => TableTs()));
                  },
                  child: const Align(
                      alignment: Alignment.centerLeft,
                      child: Text("04. DELETE"))),
            ),
          ],
        ),
      ),
    );
  }
}
