```
// Comment

/*
    Multiline
    comment
*/

// Data class declaration
class <Class name> extends <Class name> implements <Interface names> {

    // Non-editable field declaration
    [direct] val <Field name>[: <Validator/Type name>[, <Validator names>]][ [~]= Default value];
    [get { /* code */ }]
    [set { /* code */ }]

    // Editable field declaration
    [direct] var <Field name>[: <Validator/Type name>[, <Validator names>]][ [~]= Default value];
    [get { /* code */ }]
    [set { /* code */ }]
}
```
