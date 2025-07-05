export const textInputLimitation = 255;
export const minTextareaLimitation = 10;
export const maxTextareaLimitation = 1000;

export const numberWithCommas = (price) => {
    return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
