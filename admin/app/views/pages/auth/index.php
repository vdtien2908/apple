
<div class="login">
    <div class="login__header">
        <div class="login__logo">
            <a class="logo__link">
                <b>
                    <img src="./public/img/Apple_logo_black.svg" alt="">
                </b>
                ADMIN
            </a>
        </div>
    </div>
    <form class="form mt-5" id="form_login">
        <div class="form_group">
            <div class='form_field'>
                <input name="email" id='email' type="text" class="form_input" placeholder=" "
                    autocomplete="off">
                <label for="email" class="form_label">Email</label>
            </div>
            <span class="form_messages"></span>
        </div>

        <div class="form_group">
            <div class='form_field'>
                <input name="password" id='password' type="password" class="form_input" placeholder=" "
                    autocomplete="off">
                <label for="password" class="form_label">Password</label>
            </div>
            <span class="form_messages"></span>
        </div>
        <div class="form_action text-center">
            <button style="min-width: 140px" type="submit" class="btn btn_primary
            ">Login</button>
        </div>
    </form>
</div>

<script src="./public/js/toast.js"></script>
<script>
    const Validator = (options) => {
        const getParent = (element, selector) => {
            while (element.parentElement) {
                if (element.parentElement.matches(selector)) {
                    return element.parentElement;
                }
                element = element.parentElement;
            }
        };

        const formElement = document.querySelector(options.form);

        let selectorRules = {};

        const validate = (inputElement, rule) => {
            const errorElement = getParent(
                inputElement,
                options.formGroupSelector
            ).querySelector(options.errorSelector);
            let errorMessage;
            const rules = selectorRules[rule.selector];
            if (rules) {
                for (let i = 0; i < rules.length; i++) {
                    switch (inputElement.type) {
                        case "checkbox":
                        case "radio":
                            errorMessage = rules[i](
                                formElement.querySelector(
                                    rule.selector + ":checked"
                                )
                            );
                            break;
                        default:
                            errorMessage = rules[i](inputElement.value);
                    }
                    if (errorMessage) break;
                }
            }

            if (errorMessage) {
                errorElement.innerText = errorMessage;
                getParent(inputElement, options.formGroupSelector).classList.add(
                    "invalid"
                );
            } else {
                errorElement.innerText = "";
                getParent(inputElement, options.formGroupSelector).classList.remove(
                    "invalid"
                );
            }

            return !errorMessage;
        };

        if (formElement) {
            // Handle submit
            formElement.onsubmit = (e) => {
                e.preventDefault();

                let isFormValid = true;

                options.rules.forEach((rule) => {
                    const inputElement = formElement.querySelector(rule.selector);
                    let isValid = validate(inputElement, rule);
                    if (!isValid) {
                        isFormValid = false;
                    }
                });

                if (isFormValid) {
                    if (typeof options.onSubmit === "function") {
                        let enableInputs = formElement.querySelectorAll(
                            "[name]:not([disabled])"
                        );

                        const inputValues = Array.from(enableInputs).reduce(
                            (values, input) => {
                                switch (input.type) {
                                    case "radio":
                                        values[input.name] =
                                            formElement.querySelector(
                                                'input[name="' +
                                                input.name +
                                                '"]:checked'
                                            ).value;
                                        break;
                                    case "checkbox":
                                        if (!input.matches(":checked")) {
                                            values[input.name] = "";
                                            return values;
                                        }

                                        if (!Array.isArray(values[input.name])) {
                                            values[input.name] = [];
                                        }

                                        values[input.name].push(input.value);
                                        break;
                                    case "file":
                                        values[input.name] = input.files;
                                        break;
                                    default:
                                        values[input.name] = input.value;
                                }
                                return values;
                            }, {}
                        );
                        selectorRules = {};
                        options.onSubmit(inputValues);
                    } else {
                        formElement.submit();
                    }
                }
            };

            options.rules.forEach((rule) => {
                if (Array.isArray(selectorRules[rule.selector])) {
                    selectorRules[rule.selector].push(rule.test);
                } else {
                    selectorRules[rule.selector] = [rule.test];
                }

                const inputElements = formElement.querySelectorAll(rule.selector);

                Array.from(inputElements).forEach((inputElement) => {
                    if (inputElement) {
                        const errorElement = getParent(
                            inputElement,
                            options.formGroupSelector
                        ).querySelector(options.errorSelector);

                        inputElement.onblur = async () => {
                            await validate(inputElement, rule);
                        };

                        inputElement.oninput = () => {
                            errorElement.innerText = "";
                            getParent(
                                inputElement,
                                options.formGroupSelector
                            ).classList.remove("invalid");
                        };
                    }
                });
            });
        }
    };

    Validator.isRequired = (selector, message) => {
        return {
            selector: selector,
            test: (value) => {
                return value ? undefined : message || "Please enter this field";
            },
        };
    };

    Validator.isEmail = (selector, message) => {
        return {
            selector: selector,
            test: (value) => {
                const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                return regex.test(value) ?
                    undefined :
                    message || "Please enter email.";
            },
        };
    };

    Validator.minLength = function(selector, min, message) {
        return {
            selector: selector,
            test: function(value) {
                return value.length >= min ?
                    undefined :
                    message || `The password field must be at least ${value} characters.`;
            },
        };
    };
</script>
<script>
    // Handle validation form create
    Validator({
        form: '#form_login',
        formGroupSelector: '.form_group',
        errorSelector: '.form_messages',
        rules: [
            Validator.isRequired('#email', 'Email is require.'),
            Validator.isRequired('#password', 'Password is require.'),
            Validator.isEmail('#email', "Please enter email"),
            Validator.minLength('#password', 6, 'The password field must be at least 6 characters.'),
        ],
        onSubmit: (data) => {
            $.ajax({
                type: 'POST',
                url: '/apple/admin/auth/verify',
                data: data,
                success: function(response) {
                    window.location.href =`/apple/admin/home`;
                },
                error: function(error) {
                    toast({
                        title: 'Incorrect',
                        message: 'Email or password is incorrect',
                        type: 'error',
                        duration: 3000,
                    });
                }
            });
        }
    });
</script>

