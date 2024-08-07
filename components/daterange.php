<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
<style>
[x-cloak] {
    display: none;
}
</style>



<div x-data="app" x-cloak>
    <!-- <span class="font-bold my-1 text-gray-700 block">Results (would normally be hidden)</span>
                        <input type="text" name="date_from" x-model="dateFromYmdHis">
                        <input type="text" name="date_to" x-model="dateToYmdHis" class="mt-2 sm:mt-0 ml-0 sm:ml-2">
                        <label for="timemode" class="font-bold mt-3 mb-1 text-gray-700 block">Time Input Mode</label>
                        <select id="timemode" x-model="timeMode" @change="changeTimeMode()"
                            class="focus:outline-none border-none p-2 rounded-md border-r border-gray-300">
                            <option value=12>12 Hour Clock</option>
                            <option value=24>24 Hour Clock</option>
                        </select> -->
    <!-- <label for="datepicker" class="font-bold mt-3 mb-1 text-gray-700 block">Select Date/Time
                    Range</label> -->

    <div class="relative" @keydown.escape="closeDatepicker()" @click.outside="closeDatepicker()">
        <div class="flex items-end space-x-4">
            <div class="flex flex-col">
                <label for="start-date" class="mb-1 text-sm font-medium text-gray-700 dark:text-white">Start
                    Date/Time</label>
                <div class="relative w-52">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fa-light fa-calendar-range text-gray-400"></i>
                    </div>
                    <input type="text" id="start-date" readonly
                        @click="endToShow = 'from'; init(); showDatepicker = true" x-model="outputDateFromValue"
                        :class="{'font-semibold': endToShow == 'from' }" class="w-full px-10 py-2 leading-none rounded-lg shadow-sm dark:text-white dark:bg-neutral-500 dark:border-neutral-700 focus:outline-none
                        focus:shadow-outline-none text-gray-900 text-[15px]" placeholder="Select Date/Time">
                </div>
            </div>

            <div class="flex flex-col">
                <label for="end-date" class="mb-1 text-sm font-medium text-gray-700 dark:text-white">End
                    Date/Time</label>
                <div class="relative w-52">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fa-light fa-calendar-range text-gray-400"></i>
                    </div>
                    <input type="text" id="end-date" readonly @click="endToShow = 'to'; init(); showDatepicker = true"
                        x-model="outputDateToValue" :class="{'font-semibold': endToShow == 'to' }" class="w-full px-10 py-2 leading-none rounded-lg shadow-sm dark:text-white dark:bg-neutral-500 dark:border-neutral-700 focus:outline-none
                        focus:shadow-outline-none text-gray-900 text-[15px]" placeholder="Select Date/Time">
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-neutral-500 mt-12 rounded-lg shadow p-4 absolute top-0 left-0" style="width: 17rem"
            x-show="showDatepicker" x-transition>
            <div class="flex flex-col items-center">

                <div class="w-full flex justify-between items-center mb-2">
                    <div>
                        <span x-text="MONTH_NAMES[month]"
                            class="text-lg font-bold text-gray-800 dark:text-white"></span>
                        <span x-text="year" class="ml-1 text-lg text-gray-600 dark:text-white font-normal"></span>
                    </div>
                    <div>
                        <button type="button"
                            class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                            @click="if (month == 0) {year--; month=11;} else {month--;} getNoOfDays()">
                            <svg class="h-6 w-6 text-gray-500 inline-flex" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button type="button"
                            class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                            @click="if (month == 11) {year++; month=0;} else {month++;}; getNoOfDays()">
                            <svg class="h-6 w-6 text-gray-500 inline-flex" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="w-full flex flex-wrap mb-3 -mx-1">
                    <template x-for="(day, index) in DAYS" :key="index">
                        <div style="width: 14.26%" class="px-1">
                            <div x-text="day" class="text-gray-800 dark:text-white font-medium text-center text-xs">
                            </div>
                        </div>
                    </template>
                </div>

                <div class="flex flex-wrap -mx-1">
                    <template x-for="blankday in blankdays">
                        <div style="width: 14.28%" class="text-center border p-0 border-transparent text-sm">
                        </div>
                    </template>
                    <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                        <div style="width: 14.28%">
                            <div @click="getDateValue(date, false)" @mouseenter="getDateValue(date, true)" x-text="date"
                                class="p-0 dark:text-white cursor-pointer text-center text-sm leading-none leading-loose transition ease-in-out duration-100"
                                :class="{'font-bold': isToday(date) == true, 'bg-lime-100 text-white rounded-l-full': isDateFrom(date) == true, 'bg-lime-100 text-white rounded-r-full': isDateTo(date) == true, 'bg-gray-200 dark:bg-neutral-900': isInRange(date) == true }">
                            </div>
                        </div>
                    </template>
                </div>

                <div class="flex items-center my-3 border border-gray-300 rounded-md bg-gray-200"
                    :class="{'cursor-not-allowed': timePickerDisabled}">
                    <div class="inline-flex items-center h-full px-2 py-1 rounded-l-md bg-white">
                        <div class="flex flex-col items-center">
                            <div class="relative">
                                <input @click="showFromHourPicker=true" type="text" value="12" x-model="hourFromValue"
                                    :class="{'font-bold': showFromHourPicker == true, 'cursor-not-allowed': timePickerDisabled}"
                                    class="focus:outline-none w-6 text-center border-none p-0" readonly
                                    x-bind:disabled="timePickerDisabled" />
                                <div class="absolute bg-white rounded-lg shadow p-2" x-show="showFromHourPicker"
                                    x-transition @click.outside="showFromHourPicker=false">
                                    <div :class="{'w-40': timeMode==24}">
                                        <template x-for="hour in hoursFrom" :key="hour.id">
                                            <div :style="timeMode==24 && { width: '16.666666%' }"
                                                @click="if (!hour.disabled) {getHour('from', hour.id);  showToHourPicker=false;}"
                                                x-text="hour.label" class="px-1 hover:bg-blue-200"
                                                :class="{'cursor-not-allowed opacity-25': hour.disabled, 'float-left': timeMode==24,  'clear-both': timeMode==24 && hour.id > 0 && hour.id % 6 === 0}"
                                                :disabled="hour.disabled"></div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="inline-block px-1 h-full">:</div>
                        <div class="relative">
                            <input @click="showFromMinutePicker=true" type="text" x-model="minuteFromValue"
                                :class="{'font-bold': showFromMinutePicker == true, 'cursor-not-allowed': timePickerDisabled}"
                                class="focus:outline-none w-6 text-center border-none p-0" readonly
                                x-bind:disabled="timePickerDisabled" />
                            <div class="absolute top-7 bg-white rounded-lg shadow p-2"
                                :class="{'-left-24': timeMode==24, '-left-12': timeMode==12 }"
                                x-show="showFromMinutePicker" x-transition @click.outside="showFromMinutePicker=false">
                                <div class="w-72">
                                    <template x-for="minute in minutesFrom" :key="minute.id">
                                        <div style="width: 10%"
                                            @click="if (!minute.disabled) { changeMinutesFrom(minute.label); }"
                                            x-text="minute.label" class="float-left px-1 hover:bg-blue-200"
                                            :class="{'cursor-not-allowed opacity-25': minute.disabled, 'clear-both': minute.id > 0 && minute.id % 10 === 0 }"
                                            :disabled="minute.disabled"></div>
                                    </template>
                                </div>
                            </div>
                        </div>
                        <template x-if="timeMode == 12">
                            <select x-model="meridiemFrom" @change="changeMeridansFrom()"
                                x-bind:disabled="timePickerDisabled" :class="{'cursor-not-allowed': timePickerDisabled}"
                                class="focus:outline-none border-none p-0">
                                <template x-for="meridiem in meridiemsFrom" :key="meridiem.id">
                                    <option :value="meridiem.value" x-text="meridiem.label"
                                        :disabled="meridiem.disabled" :selected="meridiem.selected">
                                    </option>
                                </template>
                            </select>
                        </template>
                    </div>
                    <div class="inline-block px-2 h-full">to</div>
                    <div class="inline-flex items-center h-full px-2 py-1 rounded-r-md bg-white text-sm ">
                        <div class="flex flex-col items-center">
                            <div class="relative">
                                <input @click="showToHourPicker=true" type="text" value="11" x-model="hourToValue"
                                    :class="{'font-bold': showToHourPicker == true, 'cursor-not-allowed': timePickerDisabled}"
                                    class="focus:outline-none w-6 text-center border-none p-0" readonly
                                    x-bind:disabled="timePickerDisabled" />
                                <div class="absolute bg-white rounded-lg shadow p-2" x-show="showToHourPicker"
                                    x-transition @click.outside="showToHourPicker=false">
                                    <div :class="{'w-40': timeMode==24}">
                                        <template x-for="hour in hoursTo" :key="hour.id">
                                            <div :style="timeMode==24 && { width: '16.666666%' }"
                                                @click="if (!hour.disabled) {getHour('to', hour.id);  showToHourPicker=false;}"
                                                x-text="hour.label" class="px-1 hover:bg-blue-200"
                                                :class="{'cursor-not-allowed opacity-25': hour.disabled, 'float-left': timeMode==24,  'clear-both': timeMode==24 && hour.id > 0 && hour.id % 6 === 0}"
                                                :disabled="hour.disabled"></div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="inline-block px-1 h-full">:</div>
                        <div class="relative">
                            <input @click="showToMinutePicker=true" type="text" x-model="minuteToValue"
                                :class="{'font-bold': showToMinutePicker == true, 'cursor-not-allowed': timePickerDisabled}"
                                class="focus:outline-none w-6 text-center border-none p-0" readonly
                                x-bind:disabled="timePickerDisabled" />
                            <div class="absolute top-7 -right-16 bg-white rounded-lg shadow p-2"
                                x-show="showToMinutePicker" x-transition @click.outside="showToMinutePicker=false">
                                <div class="w-72">
                                    <template x-for="minute in minutesTo" :key="minute.id">
                                        <div style="width: 10%"
                                            @click="if (!minute.disabled) { changeMinutesTo(minute.label); }"
                                            x-text="minute.label" class="float-left px-1 hover:bg-blue-200"
                                            :class="{'cursor-not-allowed opacity-25': minute.disabled, 'clear-both': minute.id > 0 && minute.id % 10 === 0 }"
                                            :disabled="minute.disabled"></div>
                                    </template>
                                </div>
                            </div>
                        </div>
                        <template x-if="timeMode == 12">
                            <select x-model="meridiemTo" @change="changeMeridansTo()"
                                x-bind:disabled="timePickerDisabled" :class="{'cursor-not-allowed': timePickerDisabled}"
                                class="focus:outline-none border-none p-0">
                                <template x-for="meridiem in meridiemsTo" :key="meridiem.id">
                                    <option :value="meridiem.value" x-text="meridiem.label"
                                        :disabled="meridiem.disabled" :selected="meridiem.selected">
                                    </option>
                                </template>
                            </select>
                        </template>
                    </div>
                </div>

                <div>
                    <button @click="showDatepicker = false"
                        class="px-2 py-1 border border-gray-300 hover:border-gray-500 dark:bg-white text-sm rounded-md">Cancel</button>
                    <button @click="outputDateValues(); showDatepicker = false"
                        class="px-2 py-1 border border-lime-100 bg-lime-600 text-white text-sm rounded-md">OK</button>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
    'October', 'November', 'December'
];
const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

document.addEventListener('alpine:init', () => {
    Alpine.data('app', () => ({
        showDatepicker: false,
        showFromHourPicker: false,
        showToHourPicker: false,
        showFromMinutePicker: false,
        showToMinutePicker: false,
        timePickerDisabled: true,
        dateFromYmdHis: '',
        dateToYmdHis: '',
        outputDateFromValue: '',
        outputDateToValue: '',
        currentDate: null,
        dateFrom: null,
        dateTo: null,
        endToShow: '',
        timeMode: 12,
        hourFromValue: 12,
        hourToValue: 11,
        hour24FromValue: 0,
        hour24ToValue: 23,
        meridiemFrom: 'am',
        meridiemTo: 'pm',
        minuteFromValue: '00',
        minuteToValue: '59',
        selecting: false,
        month: '',
        year: '',
        no_of_days: [],
        blankdays: [],
        hoursFrom: [],
        hoursTo: [],
        minutesFrom: [],
        minutesTo: [],
        meridiemsFrom: [],
        meridiemsTo: [],

        convertFromYmd(dateYmd) {
            const year = Number(dateYmd.substr(0, 4));
            const month = Number(dateYmd.substr(5, 2)) - 1;
            const date = Number(dateYmd.substr(8, 2));

            return new Date(year, month, date);
        },

        convertToYmd(dateObject) {
            const year = dateObject.getFullYear();
            const month = dateObject.getMonth() + 1;
            const date = dateObject.getDate();

            return year + "-" + ('0' + month).slice(-2) + "-" + ('0' + date).slice(-2);
        },

        init() {
            if (!this.dateFrom) {
                if (this.dateFromYmd) {
                    this.dateFrom = this.convertFromYmd(this.dateFromYmd);
                }
            }
            if (!this.dateTo) {
                if (this.dateToYmd) {
                    this.dateTo = this.convertFromYmd(this.dateToYmd);
                }
            }
            if (!this.dateFrom) {
                this.dateFrom = this.dateTo;
            }
            if (!this.dateTo) {
                this.dateTo = this.dateFrom;
            }
            if (this.endToShow === 'from' && this.dateFrom) {
                this.currentDate = this.dateFrom;
            } else if (this.endToShow === 'to' && this.dateTo) {
                this.currentDate = this.dateTo;
            } else {
                this.currentDate = new Date();
            }
            currentMonth = this.currentDate.getMonth();
            currentYear = this.currentDate.getFullYear();
            if (this.month !== currentMonth || this.year !== currentYear) {
                this.month = currentMonth;
                this.year = currentYear;
                this.getNoOfDays();
            }
            this.setDateValues();
            this.getMeridansFrom();
            this.getMeridansTo();
        },

        changeTimeMode() {
            if (this.timeMode == 12) {
                let hourFrom = this.hour24FromValue;
                if (hourFrom === 0) {
                    hourFrom = 12;
                } else if (hourFrom > 12) {
                    hourFrom = hourFrom - 12;
                }
                let hourTo = this.hour24ToValue;
                if (hourTo === 0) {
                    hourTo = 12;
                } else if (hourTo > 12) {
                    hourTo = hourTo - 12;
                }
                this.meridiemFrom = this.hour24FromValue > 11 ? 'pm' : 'am';
                this.meridiemTo = this.hour24ToValue > 11 ? 'pm' : 'am';
                this.getHour('from', hourFrom);
                this.getHour('to', hourTo);
            } else {
                this.getHour('from', this.hour24FromValue);
                this.getHour('to', this.hour24ToValue);
            }
        },

        isToday(date) {
            const today = new Date();
            const d = new Date(this.year, this.month, date);

            return today.toDateString() === d.toDateString();
        },

        isDateFrom(date) {
            const d = new Date(this.year, this.month, date);

            if (!this.dateFrom) {
                return false;
            }

            return d.getTime() === this.dateFrom.getTime();
        },

        isDateTo(date) {
            const d = new Date(this.year, this.month, date);

            if (!this.dateTo) {
                return false;
            }

            return d.getTime() === this.dateTo.getTime();
        },

        isSingleDay() {
            if (!this.dateFrom || !this.dateTo) {
                return false;
            }
            return this.dateFrom.getTime() === this.dateTo.getTime();
        },

        isInRange(date) {
            const d = new Date(this.year, this.month, date);

            return d > this.dateFrom && d < this.dateTo;
        },

        isDisabledFromHour(hour) {
            let hour24 = hour;
            if (this.timeMode == 12) {
                if (hour === 12 && this.meridiemFrom === 'am') {
                    hour24 = 0;
                } else if (hour < 12 && this.meridiemFrom === 'pm') {
                    hour24 = hour + 12;
                }
            }
            if (this.isSingleDay() && hour24 > this.hour24ToValue) {
                return true;
            }
            return false;
        },

        isDisabledToHour(hour) {
            let hour24 = hour;
            if (this.timeMode == 12) {
                if (hour === 12 && this.meridiemTo === 'am') {
                    hour24 = 0;
                } else if (hour < 12 && this.meridiemTo === 'pm') {
                    hour24 = hour + 12;
                }
            }
            if (this.isSingleDay() && hour24 < this.hour24FromValue) {
                return true;
            }
            return false;
        },

        outputDateValues() {
            if (this.dateFrom) {
                const timeFromString = this.getTimeString('from');
                const dateFromString = this.convertToYmd(this.dateFrom);
                const dateTimeFrom = new Date(dateFromString + 'T' + timeFromString);
                this.outputDateFromValue = this.formatDateTime(dateTimeFrom, this
                    .meridiemFrom);
                this.dateFromYmdHis = dateFromString + ' ' + timeFromString;
            }
            if (this.dateTo) {
                const timeToString = this.getTimeString('to');
                const dateToString = this.convertToYmd(this.dateTo);
                const dateTimeTo = new Date(dateToString + 'T' + timeToString);
                this.outputDateToValue = this.formatDateTime(dateTimeTo, this
                    .meridiemTo);
                this.dateToYmdHis = dateToString + ' ' + timeToString;
            }
            this.endToShow = '';
        },

        formatDateTime(dateTime, meridiem) {
            const dayName = DAYS[dateTime.getDay()];
            const month = MONTH_NAMES[dateTime.getMonth()];
            const date = dateTime.getDate();
            const year = dateTime.getFullYear();
            let hour = dateTime.getHours();
            if (this.timeMode == 12) {
                if (meridiem === 'am' && hour === 0) {
                    hour = 12;
                } else if (meridiem === 'pm' && hour > 12) {
                    hour = hour - 12;
                }
                hourString = hour.toString();
                meridiem = ' ' + meridiem;
            } else {
                hourString = hour.toString().padStart(2, '0');
                meridiem = '';
            }
            const minute = dateTime.getMinutes().toString().padStart(2, '0');
            //const second  = dateTime.getSeconds().toString().padStart(2, '0');
            return dayName + ' ' + month + ' ' + date + ' ' + year + ' ' + hourString +
                ':' + minute + meridiem;
        },

        getTimeString(end) {
            const hour = end === 'from' ? this.hour24FromValue : this.hour24ToValue;
            const minute = end === 'from' ? this.minuteFromValue : this.minuteToValue;
            const second = end === 'from' ? '00' : '59';
            return hour.toString().padStart(2, '0') + ':' + minute + ':' + second;
        },

        getHour(end, hour) {
            let hour24 = hour;
            if (this.timeMode == 12) {
                const meridan = end === 'from' ? this.meridiemFrom : this.meridiemTo;
                if (hour === 12 && meridan === 'am') {
                    hour24 = 0;
                } else if (hour < 12 && meridan === 'pm') {
                    hour24 = hour + 12;
                }
            }
            if (end === 'from') {
                this.hourFromValue = this.timeMode == 12 ? hour : hour24;
                this.hour24FromValue = hour24;
                this.getHoursTo();
            } else {
                this.hourToValue = this.timeMode == 12 ? hour : hour24;
                this.hour24ToValue = hour24;
                this.getHoursFrom();
            }
            this.getMinutesFrom();
            this.getMinutesTo();
            this.getMeridansFrom();
            this.getMeridansTo();
        },

        setDateValues() {
            if (this.dateFrom) {
                const dateFromString = this.convertToYmd(this.dateFrom);
                const dateFrom = new Date(dateFromString);
            }
            if (this.dateTo) {
                const dateToString = this.convertToYmd(this.dateTo);
                const dateTo = new Date(dateToString);
            }
        },

        getDateValue(date, temp) {
            // if we are in mouse over mode but have not started selecting a range, there is nothing more to do.
            if (temp && !this.selecting) {
                return;
            }
            let selectedDate = new Date(this.year, this.month, date);
            if (this.endToShow === 'from') {
                this.dateFrom = selectedDate;
                if (!this.dateTo) {
                    this.dateTo = selectedDate;
                } else if (selectedDate > this.dateTo) {
                    this.endToShow = 'to';
                    this.dateFrom = this.dateTo;
                    this.dateTo = selectedDate;
                }
            } else if (this.endToShow === 'to') {
                this.dateTo = selectedDate;
                if (!this.dateFrom) {
                    this.dateFrom = selectedDate;
                } else if (selectedDate < this.dateFrom) {
                    this.endToShow = 'from';
                    this.dateTo = this.dateFrom;
                    this.dateFrom = selectedDate;
                }
            }
            this.setDateValues();

            this.timePickerDisabled = !this.dateFrom;

            if (!this.timePickerDisabled) {
                /* If a time tange has already been set with the from time > to time and date range is now for a single day, reset the time the range */
                if (!temp && this.isSingleDay() && parseInt(this.hour24FromValue + '' +
                        this.minuteFromValue) > parseInt(this.hour24ToValue + '' + this
                        .minuteToValue)) {
                    this.hourFromValue = this.timeMode == 12 ? 12 : 0;
                    this.hourToValue = this.timeMode == 12 ? 11 : 23;
                    this.hour24FromValue = 0;
                    this.hour24ToValue = 23;
                    this.meridiemFrom = 'am';
                    this.meridiemTo = 'pm';
                    this.minuteFromValue = '00';
                    this.minuteToValue = '59';
                }
                this.getHoursFrom();
                this.getHoursTo();
                this.getMinutesFrom();
                this.getMinutesTo();
                this.getMeridansFrom();
                this.getMeridansTo();
            }

            if (!temp) {
                this.selecting = !this.selecting;
            }
        },

        getNoOfDays() {
            let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

            // find where to start calendar day of week
            let dayOfWeek = new Date(this.year, this.month).getDay();
            let blankdaysArray = [];
            for (var i = 1; i <= dayOfWeek; i++) {
                blankdaysArray.push(i);
            }

            let daysArray = [];
            for (var i = 1; i <= daysInMonth; i++) {
                daysArray.push(i);
            }

            this.blankdays = blankdaysArray;
            this.no_of_days = daysArray;
        },

        getHoursFrom() {
            this.hoursFrom = [];
            for (let i = 0; i < this.timeMode; i++) {
                let value = this.timeMode == 12 && i === 0 ? 12 : i;
                let hour = new Object();
                hour.id = value;
                hour.label = this.timeMode == 12 ? value : i.toString().padStart(2,
                    '0');
                hour.disabled = this.isDisabledFromHour(value);
                this.hoursFrom.push(hour);
            }
        },

        getHoursTo() {
            this.hoursTo = [];
            for (let i = 0; i < this.timeMode; i++) {
                let value = this.timeMode == 12 && i === 0 ? 12 : i;
                let hour = new Object();
                hour.id = value;
                hour.label = this.timeMode == 12 ? value : i.toString().padStart(2,
                    '0');
                hour.disabled = this.isDisabledToHour(value);
                this.hoursTo.push(hour);
            }
        },

        changeMinutesFrom(minute) {
            this.minuteFromValue = minute;
            this.showFromMinutePicker = false;
            this.getMinutesTo();
        },

        changeMinutesTo(minute) {
            this.minuteToValue = minute;
            this.showToMinutePicker = false;
            this.getMinutesFrom();
        },

        getMinutesFrom() {
            this.minutesFrom = [];
            for (let i = 0; i < 60; i++) {
                let minute = new Object();
                minute.id = i;
                minute.label = i.toString().padStart(2, '0');
                minute.disabled = this.isSingleDay() && this.hour24FromValue === this
                    .hour24ToValue && minute.label > this.minuteToValue;
                this.minutesFrom.push(minute);
            }
        },

        getMinutesTo() {
            this.minutesTo = [];
            for (let i = 0; i < 60; i++) {
                let minute = new Object();
                minute.id = i;
                minute.label = i.toString().padStart(2, '0');
                minute.disabled = this.isSingleDay() && this.hour24FromValue === this
                    .hour24ToValue && this.minuteFromValue > minute.label;
                this.minutesTo.push(minute);
            }
        },

        changeMeridansFrom() {
            this.getHour('from', this.hourFromValue);
            this.getHoursFrom();
            this.getHoursTo();
            this.getMinutesFrom();
            this.getMinutesTo();
            this.getMeridansTo();
        },

        changeMeridansTo() {
            this.getHour('to', this.hourToValue);
            this.getHoursFrom();
            this.getHoursTo();
            this.getMinutesFrom();
            this.getMinutesTo();
            this.getMeridansFrom();
        },

        getMeridansFrom() {
            this.meridiemsFrom = [];
            let meridiemAM = new Object();
            meridiemAM.id = 1;
            meridiemAM.value = 'am';
            meridiemAM.label = 'AM';
            meridiemAM.disabled = false;
            meridiemAM.selected = this.meridiemFrom === 'am';
            let meridiemPM = new Object();
            meridiemPM.id = 2;
            meridiemPM.value = 'pm';
            meridiemPM.label = 'PM';
            meridiemPM.disabled = this.isSingleDay() && (this.meridiemTo === 'am' ||
                this.hour24FromValue > this.hour24ToValue);
            meridiemPM.selected = this.meridiemFrom === 'pm';
            this.meridiemsFrom.push(meridiemAM);
            this.meridiemsFrom.push(meridiemPM);
        },

        getMeridansTo() {
            this.meridiemsTo = [];
            let meridiemAM = new Object();
            meridiemAM.id = 1;
            meridiemAM.value = 'am';
            meridiemAM.label = 'AM';
            meridiemAM.disabled = this.isSingleDay() && (this.meridiemFrom === 'pm' ||
                this.hour24FromValue > this.hour24ToValue);
            meridiemAM.selected = this.meridiemTo === 'am';
            let meridiemPM = new Object();
            meridiemPM.id = 2;
            meridiemPM.value = 'pm';
            meridiemPM.label = 'PM';
            meridiemPM.disabled = false;
            meridiemPM.selected = this.meridiemTo === 'pm';
            this.meridiemsTo.push(meridiemAM);
            this.meridiemsTo.push(meridiemPM);
        },

        closeDatepicker() {
            this.endToShow = '';
            this.showDatepicker = false;
        }
    }))
})
</script>
