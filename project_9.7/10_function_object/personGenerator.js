const personGenerator = {
    surnameMaleJson: `{  
        "count": 15,
        "list": {
            "id_1": "Иванов",
            "id_2": "Смирнов",
            "id_3": "Кузнецов",
            "id_4": "Васильев",
            "id_5": "Петров",
            "id_6": "Михайлов",
            "id_7": "Новиков",
            "id_8": "Федоров",
            "id_9": "Кравцов",
            "id_10": "Николаев",
            "id_11": "Семёнов",
            "id_12": "Славин",
            "id_13": "Степанов",
            "id_14": "Павлов",
            "id_15": "Александров",
            "id_16": "Морозов"
        }
    }`,
    surnameFemaleJson: `{  
        "count": 15,
        "list": {
            "id_1": "Ивановa",
            "id_2": "Смирновa",
            "id_3": "Кузнецовa",
            "id_4": "Васильевa",
            "id_5": "Петровa",
            "id_6": "Михайловa",
            "id_7": "Новиковa",
            "id_8": "Федоровa",
            "id_9": "Кравцовa",
            "id_10": "Николаевa",
            "id_11": "Семёновa",
            "id_12": "Славинa",
            "id_13": "Степановa",
            "id_14": "Павловa",
            "id_15": "Александровa",
            "id_16": "Морозовa"
        }
    }`,
    firstNameMaleJson: `{
        "count": 10,
        "list": {     
            "id_1": "Александр",
            "id_2": "Максим",
            "id_3": "Иван",
            "id_4": "Артем",
            "id_5": "Дмитрий",
            "id_6": "Никита",
            "id_7": "Михаил",
            "id_8": "Даниил",
            "id_9": "Егор",
            "id_10": "Андрей"
        }
    }`,
    firstNameFemaleJson: `{
        "count": 10,
        "list": {     
            "id_1": "Александра",
            "id_2": "Марина",
            "id_3": "Ирина",
            "id_4": "Алина",
            "id_5": "Дария",
            "id_6": "Наталья",
            "id_7": "Мария",
            "id_8": "Дарья",
            "id_9": "Елена",
            "id_10": "Анастасия"
        }
    }`,
    patronymicMaleJson: `{
        "count": 10,
        "list": {     
            "id_1": "Александрович",
            "id_2": "Максимович",
            "id_3": "Иванович",
            "id_4": "Артемович",
            "id_5": "Дмитриевич",
            "id_6": "Никитич",
            "id_7": "Михаилович",
            "id_8": "Даниилович",
            "id_9": "Егорович",
            "id_10": "Андреевич"
        }
    }`,
    patronymicFemaleJson: `{
        "count": 10,
        "list": {     
            "id_1": "Александровна",
            "id_2": "Максимовна",
            "id_3": "Ивановна",
            "id_4": "Артемовна",
            "id_5": "Дмитриевна",
            "id_6": "Никитична",
            "id_7": "Михаиловна",
            "id_8": "Данииловна",
            "id_9": "Егоровна",
            "id_10": "Андреевна"
        }
    }`,
    postMaleJson: `{
        "count": 7,
        "list": {     
            "id_1": "Слесарь",
            "id_2": "Сантехник",
            "id_3": "Финансовый директор",
            "id_4": "Директор",
            "id_5": "Строитель",
            "id_6": "Водитель",
            "id_7": "Военный"
        }
    }`,
    postFemaleJson: `{
        "count": 6,
        "list": {     
            "id_1": "Бухгалтер",
            "id_2": "Главный бухгалтер",
            "id_3": "Повар",
            "id_4": "Уборщица",
            "id_5": "Учительница",
            "id_6": "Менеджер"
        }
    }`,

    gender: `{
        "count": 2,
        "list": {     
            "id_1": "Мужчина",
            "id_2": "Женщина"
        }
    }`,

    randomIntNumber: (max = 1, min = 0) => Math.floor(Math.random() * (max - min + 1) + min),

    randomValue: function (json) {
        const obj = JSON.parse(json);
        const prop = `id_${this.randomIntNumber(obj.count, 1)}`;
        return obj.list[prop];
    },

    randomData: function () {
        var endDate = new Date(2002, 01, 05);
        var getDateMillisecond = endDate.getTime();
        var monthArr = ["Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря"];

        var random = this.randomIntNumber(getDateMillisecond, 0);
        var date = new Date(random);
        var birthDay = date.getDate();
        var birthMonth = date.getMonth();
        var birthMonth = monthArr[birthMonth];
        var birthYear = date.getFullYear();

        var birthData = birthDay + ' ' + birthMonth + ' ' + birthYear;

        return birthData;

    },

    randomGender: function () {
        return this.randomValue(this.gender);
    },

    randomSurname: function () {
        if (this.person.gender === "Мужчина") {
            return this.randomValue(this.surnameMaleJson);
        } else {
            return this.randomValue(this.surnameFemaleJson);
        }
    },

    randomFirstName: function () {
        if (this.person.gender === "Мужчина") {
            return this.randomValue(this.firstNameMaleJson);
        } else {
            return this.randomValue(this.firstNameFemaleJson);
        }
    },

    randomPatronymicName: function () {
        if (this.person.gender === "Мужчина") {
            return this.randomValue(this.patronymicMaleJson);
        } else {
            return this.randomValue(this.patronymicFemaleJson);
        }
    },

    randomРost: function () {
        if (this.person.gender === "Мужчина") {
            return this.randomValue(this.postMaleJson);
        } else {
            return this.randomValue(this.postFemaleJson);
        }
    },

    getPerson: function () {
        this.person = {};
        this.person.gender = this.randomGender();

        this.person.surnameName = this.randomSurname();
        this.person.firstName = this.randomFirstName();
        this.person.patronymicName = this.randomPatronymicName();
        this.person.post = this.randomРost();
        this.person.date = this.randomData();

        return this.person;
    }
};