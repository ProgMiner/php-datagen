```php

// Namespace declaration
namespace <Namespace>;

// Use declaration
use <Class full name> [as <Class alias>];

// PDGL block
/**pdgl

// Comment

// PDG class declaration
//
// - final - Makes class not abstract and not prefixed (e.g. Test)
// - final! - Like `final` but also makes class final
// - <Class name> - Name of class (result name is also depends from `final` modifier and prefix configuration)
// - extends <Class name> - Name of class that was been extended
// - <Interface names> - Names of interfaces that was been implemented
// - { ... }/; - Class body can be skipped or replaced to semicolon
//
[final[!]] class <Class name>[ extends <Class name>][ implements <Interface names>] [{

    // Constant declaration
    //
    // - [public/protected/private] - Const visibility modifier
    // - const- Const declaration keyword
    // - <Const name> - Name of result const
    // - = - Assign value operator
    // - <Const value> - A valid code on PHP that can be default value
    // - ; - Semicolon can be skipped if you do not set default value. Else it is required
    //
    [public/protected/private] const <Const name> [= <Const value>][;]

    // Field declaration
    //
    // - direct - Makes access to result property direct (sets `protected` modifier instead of `private`)
    // - <val/var> - Field declaration keyword
    //   - val - Makes field not editable
    //   - var - Makes field editable
    // - <Field name> - Name of result property
    // - <Type name> - Name of type of result property
    // - <:/</>= - Assign default value operator
    //   - := - Disables default value validation (for experts!)
    //   - <= - Assigns default value in property declaration
    //   - = - Assigns default value in conctructor with validating
    // - <Default value> - A valid code on PHP that can be default value
    // - ; - Semicolon can be skipped if you do not set default value. Else it is required
    //
    [direct] <val/var> <Field name>[: <Type name>][ <:/</>= <Default value>][;]
}/;]

// Enum declaration
//
// - [; /* Regular consts and fields */ - After enum's consts you can declare regular consts and fields
enum <Enum name> {

    // Enum's consts declaration
    //
    // - Const name - Constant name
    // - Const value - Constant value. Only int type
    // - Other consts - Other consts
    <Const name> [= <Const value>][, <Other consts>]
}
*/
```
